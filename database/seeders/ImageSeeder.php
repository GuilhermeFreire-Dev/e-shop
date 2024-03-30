<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Sku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urls = [
            'https://img.lojasrenner.com.br/item/549243106/large/12.jpg',
            'https://img.lojasrenner.com.br/item/591582996/large/12.jpg',
            'https://img.lojasrenner.com.br/item/883277150/large/12.jpg',
            'https://img.lojasrenner.com.br/item/877852808/large/12.jpg',
            'https://img.lojasrenner.com.br/item/883887222/large/12.jpg',
            'https://img.lojasrenner.com.br/item/549282113/large/12.jpg',
            'https://img.lojasrenner.com.br/item/883887126/large/12.jpg',
            'https://img.lojasrenner.com.br/item/549243069/large/12.jpg',
            'https://img.lojasrenner.com.br/item/883887273/large/12.jpg',
        ];

        $skus = Sku::all();
        $skus->each(function($sku) use($urls) {
            $index = rand(0,2);
            for ($i=0; $i < 3; $i++) {
                $init = $index * 3;
                Image::create([
                    'description'=> fake()->sentence(),
                    'sku_id'=> $sku->id,
                    'uri'=> $urls[rand($init, $init + 2)],
                    'position'=> rand(1,3)
                ]);
            }
        });
    }
}
