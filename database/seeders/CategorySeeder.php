<?php

namespace Database\Seeders;

use App\Entities\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Games',
            'Computers',
            'TVs and Accessories',
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}
