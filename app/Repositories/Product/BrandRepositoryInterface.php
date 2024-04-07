<?php

namespace App\Repositories\Product;

use App\Entities\Brand;
use Illuminate\Support\Collection;

interface BrandRepositoryInterface
{
    public function create(Brand $brand): Brand;
    public function update(Brand $brand): Brand;
    public function delete(int $id): bool;
    public function find(int $id): Brand;
    public function findAll(int $page): Collection;
}