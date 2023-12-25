<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductUpdateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/products');

    //     $response->assertStatus(200);
    // }

    public function test_product_update() {
        $product = Product::find(1);
        $response = $this->put('/product/' . $product->id, [
            "name" => "Burger",
            "description" => "Burger with chesse",
            "price" => 2500
        ]);

        $response->assertStatus(302);
    }
}
