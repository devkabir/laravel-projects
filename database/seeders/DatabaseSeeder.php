<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory()->create(['code' => 'FR1', 'price' => 3.11]);
        Product::factory()->create(['code' => 'SR1', 'price' => 5]);
        Product::factory()->create(['code' => 'CF1', 'price' => 11.23]);
    }
}
