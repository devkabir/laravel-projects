<?php

    use App\Models\User;
    use App\Models\Variant;
    use App\Models\Product;
    use Faker\Generator as Faker;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run( Faker $faker )
        {
//         $this->call(UserSeeder::class);

            factory( User::class )->create( ['email' => 'a@g.com'] );
            factory( Variant::class, 3 )->create();

            factory( Product::class, 1000 )->create();
            $products = Product::all();
            foreach ( $products as $product ) {
                $variant = Variant::query()->get()->random();
                $productVariants =\App\Models\ProductVariant::query()->latest()->pluck('id');
                $product->productImages()->create( [
                                                       'file_path' => $faker->imageUrl(),
                                                   ] );
                $product->productVariants()->create( [
                                                         'variant'    => $faker->word,
                                                         'variant_id' => $variant->id,
                                                     ] );
                $product->productVariantPrices()->create( [
                                                              'product_variant_one'   => $productVariants[0] ?? null,
                                                              'product_variant_two'   => $productVariants[1] ?? null,
                                                              'product_variant_three' => $productVariants[2] ?? null,
                                                              'price'                 => $faker->randomDigit,
                                                              'stock'                 => $faker->randomDigit,
                                                          ] );
            }

        }
    }
