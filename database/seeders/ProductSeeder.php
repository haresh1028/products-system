<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Samsung Galaxy S21',
                'price' => 699.99,
                'category' => 'Mobiles',
                'image' => 'samsung.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'HP Pavilion 15 Laptop',
                'price' => 589.90,
                'category' => 'Computers',
                'image' => 'hp.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'LG Washing Machine',
                'price' => 359.50,
                'category' => 'Home Appliances',
                'image' => 'lg.jpg',
                'is_active' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
