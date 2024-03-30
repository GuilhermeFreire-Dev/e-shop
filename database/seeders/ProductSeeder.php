<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $brands = Brand::all();

        for ($i=0; $i < 20; $i++) { 
            Product::create([
                'name'=> 'Camiseta '.fake()->colorName(),
                'description'=> fake()->text(),
                'brand_id'=> $brands->random(1)->shift()->id,
                'category_id'=> $categories->random(1)->shift()->id
            ]);
        }
    }
}
