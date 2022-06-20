<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $codes = ['FR1', 'SR1', 'CF1'];
        $prices = [3.11,5.00,11.23];
        return [
            'code'  => $codes[array_rand($codes, 1)],
            'name'  => $this->faker->unique()->word(),
            'price' => $prices[array_rand($prices, 1)],
        ];
    }
}
