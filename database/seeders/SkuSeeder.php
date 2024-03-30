<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $sizes = ['XP', 'P', 'M', 'G', 'XG'];

        $products->each(function($product) use($sizes) {
            for ($i=0; $i < 5; $i++) {
                Sku::create([
                    'product_id'=> $product->id,
                    'name'=> "{$product->name} {$sizes[$i]}",
                    'size'=> $sizes[$i],
                    'color'=> fake()->safeColorName(),
                    'hex'=> fake()->hexColor(),
                    'tissue'=> 'algodão',
                    'last_price'=> fake()->randomFloat(2,30,300),
                    'current_price'=> fake()->randomFloat(2,30,300),
                    'quantity'=> rand(0,100)
                ]);
            }
        });
    }
}
