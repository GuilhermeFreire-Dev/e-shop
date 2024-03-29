<?php

namespace App\Repositories\Product;

use App\Entities\Product;
use \App\Models\Product as Model;
use App\Repositories\Product\ProductRepositoryInterface;

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

    public function delete(Product $product): bool
    {
        return $this->product->findOrFail($product->id)->delete();
    }

    public function find(int $id): Model
    {
        return $this->product
        ->join('brands', 'product.brand_id', '=', 'brands.id')
        ->join('categories', 'product.category_id', '=', 'categories.id')
        ->findOrFail($id);
    }
}