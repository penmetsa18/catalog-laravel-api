<?php

namespace Tests\Feature;

use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products_unauthorized()
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
    }

    public function test_product_unauthorized()
    {
        $response = $this->getJson('/api/products/1');
        $response->assertStatus(200);
    }

    public function test_store_product_unauthorized()
    {
        $response = $this->postJson('/api/products', [
            'name' => 'New game',
            'category_id' => 1,
            'sku' => 'A00099',
            'price' => 1.99,
            'quantity' => 1,
        ]);

        $response->assertStatus(401);
        $response->assertJsonCount(1);
    }

    public function test_store_product_authorized()
    {
        $this->actingAs(User::find(1));
        $response = $this->postJson('/api/products', [
            'name' => 'New game',
            'category_id' => 1,
            'sku' => 'A00099',
            'price' => 1.99,
            'quantity' => 1,
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(8);
    }

    public function test_store_product_validation_authorized()
    {
        $this->actingAs(User::find(1));
        $response = $this->postJson('/api/products', [
            'name' => 'New game',
        ]);

        $response->assertStatus(422);
        $response->assertJsonCount(2); // validation messages
    }


    public function test_update_product_authorized()
    {
        $this->actingAs(User::find(1));
        $response = $this->putJson('/api/products/1', [
            'name' => 'New game updated',
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(8);
    }

    public function test_delete_product_authorized()
    {
        $this->actingAs(User::find(1));

        $response = $this->deleteJson('/api/products/1');
        $response->assertStatus(200);
        $response->assertExactJson([true]);
    }
}
