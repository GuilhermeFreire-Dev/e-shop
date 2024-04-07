<?php

namespace App\Repositories\Product;

use App\Entities\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function create(Product $product): Product;
    public function update(Product $product): Product;
    public function delete(int $id): bool;
    public function find(int $id): Product;
    public function findAll(int $page): Collection;
}