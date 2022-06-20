<?php

    namespace App\Http\Controllers\Api;

    use Carbon\Carbon;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Http\JsonResponse;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\ProductRequest;
    use App\Http\Requests\ProductUpdateRequest;
    use function response;

    class ProductController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return JsonResponse
         */
        public function index(): JsonResponse
        {
            $products = Product::query()
                               ->when( request( 'search', '' ) != '', function ( $query ) {
                                   $query->where( function ( $q ) {
                                       $q->where( 'title', 'LIKE', '%' . request( 'search' ) . '%' );
                                   } );
                               } )
                               ->when( request( 'created_at', '' ) != '', function ( $query ) {
                                   $query->where( function ( $q ) {
                                       $q->whereDate( 'created_at', '=', Carbon::parse( request( 'created_at' ) ) );
                                   } );
                               } )
                               ->when( request( 'variant', '' ) != '', function ( $query ) {

                                   $query->whereHas( 'productVariants', function ( $q ) {

                                       $q->where( 'variant', request( 'variant' ) );

                                   } );
                               } )
                               ->when( request( 'price_from', '' ) != null, function ( $query ) {

                                   $query->whereHas( 'productVariantPrices', function ( $q ) {

                                       $q->where( 'price', '>=', request( 'price_from' ) );

                                   } );
                               } )
                               ->when( request( 'price_to', '' ) != null, function ( $query ) {

                                   $query->whereHas( 'productVariantPrices', function ( $q ) {

                                       $q->where( 'price', '<=', request( 'price_to' ) );

                                   } );
                               } )
                               ->latest()
                               ->with( 'productVariantPrices' )
                               ->paginate( 250 );
            return response()->json( $products );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param ProductRequest $request
         *
         * @return JsonResponse
         */
        public function store( ProductRequest $request ): JsonResponse
        {
            $attributes = $request->validated();

            $product = Product::query()->create( $attributes );
            $this->storeProductImage( $attributes['product_image'], $product );
            $this->storeProductVariant( $attributes['product_variant'], $attributes['product_variant_prices'], $product );
            return response()->json( $product->title . ' created successfully!', 200 );

        }

        /**
         * @param $product_image
         * @param $product
         */
        public function storeProductImage( $product_image, $product ): void
        {
            foreach ( $product_image as $image ) {
                if ( !$product->productImages()->where( 'file_path', $image )->exists() ) $product->productImages()->create( ['file_path' => $image] );
            }
        }

        /**
         * @param $product_variant
         * @param $product_variant_prices
         * @param $product
         */
        public function storeProductVariant( $product_variant, $product_variant_prices, $product )
        {
            foreach ( $product_variant as $variant ) {
                foreach ( $variant['tags'] as $tag ) {
                    if ( !$product->productVariants()->where( 'variant_id', $variant['option'] )->where( 'variant', $tag )->exists() ) {
                        $product->productVariants()->create( ['variant_id' => $variant['option'], 'variant' => $tag] );
                    }
                }
            }

            foreach ( $product_variant_prices as $price ) {
                $variant            = array_filter( explode( '/', $price['title'] ) );
                $variant_collection = $product->productVariants()->get()->collect();
                $variant1           = array_key_exists( 0, $variant ) ? $variant_collection->firstWhere( 'variant', trim( $variant[0] ) )->id : null;
                $variant2           = array_key_exists( 1, $variant ) ? $variant_collection->firstWhere( 'variant', $variant[1] ) ? $variant_collection->firstWhere( 'variant', $variant[1] )->id : null : null;
                $variant3           = array_key_exists( 2, $variant ) ? $variant_collection->firstWhere( 'variant', $variant[2] ) ? $variant_collection->firstWhere( 'variant', $variant[1] )->id : null : null;
                $product->productVariantPrices()->create( [
                                                              'product_variant_one'   => $variant1,
                                                              'product_variant_two'   => $variant2,
                                                              'product_variant_three' => $variant3,
                                                              'price'                 => $price['price'],
                                                              'stock'                 => $price['stock'],
                                                          ] );
            }
        }


        public function store_images( Request $request )
        {
            return $request->file( 'file' )->store( 'images' );
        }

        /**
         * Update the specified resource in storage.
         *
         * @param ProductUpdateRequest $request
         * @param int                  $id
         *
         * @return JsonResponse
         */
        public function update( ProductUpdateRequest $request, int $id ): JsonResponse
        {

            $attributes = $request->validated();

            $product = Product::query()
                              ->with( ['productImages', 'productVariants', 'productVariantPrices'] )
                              ->find( $id );
            $product->update( $attributes );

            $this->storeProductImage( $attributes['product_image'], $product );

            $product->productVariants()->delete();
            $this->storeProductVariant( $attributes['product_variant'], $attributes['product_variant_prices'], $product );


            return response()->json( $product->title . ' updated successfully!', 200 );


        }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     *
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
    }
