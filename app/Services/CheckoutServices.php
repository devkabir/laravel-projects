<?php


namespace App\Services;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CheckoutServices
{
    public  $total = 0;
    private $rules;

    /**
     * CheckoutServices constructor.
     *
     * @param $rules
     */
    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function scan(string $string)
    {
        $product = Product::where('code', $string)->first();
        if ($product) Cart::create(['product_id' => $product->id]);
        $this->getTotal();
    }

    private function getTotal(): void
    {
        $cart        = Cart::query()
                           ->join('products', 'carts.product_id', '=', 'products.id')
                           ->selectRaw("products.code, products.price,  sum(carts.qty) as qty")
                           ->groupByRaw('products.code,products.price')
                           ->get();
        $this->total = 0;
        foreach ($cart as $product) {
            $rule = $this->rules[$product->code] ?? null;
            if ($rule) $this->total += $this->{$rule[0]}($product, $rule[1], $rule[2]);
            else $this->total += $product->qty * $product->price;
        }
    }

    private function getOneFree($product, $rule1, $rule2)
    {
        $qty = floor($product->qty / 2) + $product->qty % 2;
        return $qty * $product->price;
    }

    private function bulkDiscount($product, $rule1, $rule2)
    {
        $price = ($product->qty >= $rule1) ? $rule2 : $product->price;
        return $product->qty * $price;
    }

}
