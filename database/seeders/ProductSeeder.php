<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => "Blue t-shirt",
            'price' => 50.000,
            'image_url' => "public/Images/BackgroundRegis",
            'description' => "baju biru",
            'stock' => 8
        ]);
        Product::create([
            'name' => "Blue t-shirt",
            'price' => 50.000,
            'image_url' => "public/Images/BackgroundRegis",
            'description' => "baju biru",
            'stock' => 8
        ]);
        Product::create([
            'name' => "Blue t-shirt",
            'price' => 50.000,
            'image_url' => "public/Images/BackgroundRegis",
            'description' => "baju biru",
            'stock' => 8
        ]);
        Product::create([
            'name' => "Blue t-shirt",
            'price' => 50.000,
            'image_url' => "public/Images/BackgroundRegis",
            'description' => "baju biru",
            'stock' => 8
        ]);
    }
}
