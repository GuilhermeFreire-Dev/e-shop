<?php

namespace App\Repositories\Product;

use App\Entities\Brand;
use App\Models\Brand as Model;
use App\Repositories\Product\BrandRepositoryInterface;
use Illuminate\Support\Collection;

class BrandRepository implements BrandRepositoryInterface
{
    public function __construct(
        private Model $brand
    ) {}

    public function create(Brand $brand): Brand
    {
        $newBrand = $this->brand->create($brand->toArray());
        return Brand::makeFromArray($newBrand->toArray());
    }

    public function update(Brand $brand): Brand
    {
        $this->brand->findOrFail($brand->id)->update($brand->toArray());
        return $brand;
    }

    public function delete(int $id): bool
    {
        return $this->brand->findOrFail($id)->delete();
    }

    public function find(int $id): Brand
    {
        return Brand::makeFromArray($this->brand->findOrFail($id)->toArray());
    }

    public function findAll(int $page): Collection
    {
        return $this->brand->limit(10)->offset($page)->get();
    }
}