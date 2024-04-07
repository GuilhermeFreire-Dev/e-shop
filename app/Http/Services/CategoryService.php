<?php

namespace App\Http\Services;

use App\Entities\Category;
use App\Repositories\Product\CategoryRepositoryInterface;
use Illuminate\Support\Collection;
use stdClass;

class CategoryService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) { }

    public function create(Category $category): stdClass
    {
        return (object) $this->categoryRepository->create($category)->toArray();
    }

    public function update(Category $category): stdClass
    {
        return (object) $this->categoryRepository->update($category)->toArray();
    }

    public function delete(int $id): bool
    {
        return $this->categoryRepository->delete($id);
    }

    public function find(int $id): stdClass
    {
        return (object) $this->categoryRepository->find($id)->toArray();
    }

    public function findAll(int $page): Collection
    {
        return (object) $this->categoryRepository->findAll($page);
    }
}
