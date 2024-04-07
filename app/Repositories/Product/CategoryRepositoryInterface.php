<?php

namespace App\Repositories\Product;

use App\Entities\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function create(Category $category): Category;
    public function update(Category $category): Category;
    public function delete(int $id): bool;
    public function find(int $id): Category;
    public function findAll(int $page): Collection;
}