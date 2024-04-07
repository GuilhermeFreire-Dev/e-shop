<?php

namespace App\Repositories\Product;

use \App\Entities\Category;
use App\Models\Category as Model;
use App\Repositories\Product\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        private Model $category
    ) {}

    public function create(Category $category): Category
    {
        $newCategory = $this->category->create($category->toArray());
        return Category::makeFromArray($newCategory->toArray());
    }

    public function update(Category $category): Category
    {
        $this->category->findOrFail($category->id)->update($category->toArray());
        return $category;
    }

    public function delete(int $id): bool
    {
        return $this->category->findOrFail($id)->delete();
    }

    public function find(int $id): Category
    {
        return Category::makeFromArray($this->category->findOrFail($id)->toArray());
    }

    public function findAll(int $page): Collection
    {
        return $this->category->limit(10)->offset($page)->get();
    }
}