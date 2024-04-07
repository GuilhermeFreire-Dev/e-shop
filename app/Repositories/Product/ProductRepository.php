<?php

namespace App\Repositories\Product;

use App\Entities\Product;
use \App\Models\Product as Model;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private Model $product
    ) {}

    public function create(Product $product): Product
    {
        $newProduct = $this->product->create($product->toArray());
        return Product::makeFromArray($newProduct->toArray());
    }

    public function update(Product $product): Product
    {
        $this->product->findOrFail($product->id)->update($product->toArray());
        return $product;
    }

    public function delete(int $id): bool
    {
        return $this->product->findOrFail($id)->delete();
    }

    public function find(int $id): Product
    {
        return Product::makeFromArray($this->product->findOrFail($id)->toArray());
    }

    public function findAll(int $page): Collection
    {
        $products = $this->product
        ->limit(10)
        ->offset($page)
        ->get();

        return $products->map(function ($product) {
            $item = $product->toArray();
            $item['brand'] = $product->brand()->first();
            $item['category'] = $product->category()->first();
            $sku = $product->skus()->first();
            $item['sku'] = $sku;
            $item['image'] = $sku->images()->where('position', 1)->first();
            return (object) $item;
        });
    }
}