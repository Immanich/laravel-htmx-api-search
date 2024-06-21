<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

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
                'name' => 'ROLAND',
                'description' => 'XPS-10',
                'qty' => 99,
                'price' => 32999.00
            ],
            [
                'name' => 'ROLAND',
                'description' => 'XPS-30',
                'qty' => 99,
                'price' => 42999.00
            ],
            [
                'name' => 'NORD',
                'description' => 'Stage',
                'qty' => 99,
                'price' => 133999.00
            ],
            [
                'name' => 'NORD',
                'description' => 'Lead',
                'qty' => 99,
                'price' => 249999.00
            ],
            [
                'name' => 'NORD',
                'description' => 'electro',
                'qty' => 99,
                'price' => 89999.00
            ],
            [
                'name' => 'KORG',
                'description' => 'Kross',
                'qty' => 99,
                'price' => 48999.00
            ],
        ];

        foreach($products as $product) {
            Product::create($product);
        }
    }
}
