<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CheckoutServices;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }


    /**
     * if you add 3 product then you will pay for 2 product and get one free
     */
    public function test_one()
    {
        $rules = [
            'FR1' => ['getOneFree', null, null],
            'SR1' => ['bulkDiscount', 3, 4.50],
        ];
        $co    = new CheckoutServices($rules);
        $co->scan("FR1");
        $co->scan("SR1");
        $co->scan("FR1");
        $co->scan("FR1");
        $co->scan("CF1");
        $this->assertEquals(22.45, $co->total);
    }

    /**
     * if you add 3 product then you will pay for 2 product and get one free
     */
    public function test_two()
    {
        $rules = [
            'FR1' => ['getOneFree', null, null],
            'SR1' => ['bulkDiscount', 3, 4.50],
        ];
        $co    = new CheckoutServices($rules);
        $co->scan("FR1");
        $co->scan("FR1");
        $this->assertEquals(3.11, $co->total);
    }

    /**
     * if you add three SR1 product price will be 4.50 instead of 5.00
     */
    public function test_three()
    {
        $rules = [
            'FR1' => ['getOneFree', null, null],
            'SR1' => ['bulkDiscount', 3, 4.50],
        ];
        $co    = new CheckoutServices($rules);
        $co->scan("SR1");
        $co->scan("SR1");
        $co->scan("FR1");
        $co->scan("SR1");
        $this->assertEquals(16.61, $co->total);
    }
}
