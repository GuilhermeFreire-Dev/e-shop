<?php

namespace App\Repositories\Product;

use App\Entities\Product;

interface ProductRepositoryInterface
{
    public function create(Product $product): Product;
    public function update(Product $product): Product;
    public function delete(Product $product): bool;
    public function find(int $id): \App\Models\Product;
}