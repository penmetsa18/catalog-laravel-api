<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Product;
use App\Entities\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Fifa 2012',
                'category' => 'Games',
                'sku' => 'A0001',
                'price' => 69.99,
                'quantity' => 20,
            ],
            [
                'name' => 'Assasin’s Creed 5',
                'category' => 'Games',
                'sku' => 'A0002',
                'price' => 79.99,
                'quantity' => 15,
            ],
            [
                'name' => 'Asus Zenbook 13\” - Aluminum',
                'category' => 'Games',
                'sku' => 'A0003',
                'price' => 1399.99,
                'quantity' => 10,
            ],
            [
                'name' => 'Sony UHD HDR 55\" 4k TV',
                'category' => 'TVs and Accessories',
                'sku' => 'A0004',
                'price' => 2399.99,
                'quantity' => 5,
            ]
        ];

        foreach($products as $product) {
            $category = Category::where('name', $product['category'])->first();
            if($category) {
                unset($product['category']);
                $product['category_id'] = $category->id;
                Product::create($product);
            }

        }
    }
}
