<?php

namespace App\Http\Services;
use App\Entities\Brand;
use App\Repositories\Product\BrandRepositoryInterface;
use Illuminate\Support\Collection;
use stdClass;

class BrandService
{
    public function __construct(
        private BrandRepositoryInterface $brandRepository
    ) { }

    public function create(Brand $brand): stdClass
    {
        return (object) $this->brandRepository->create($brand)->toArray();
    }

    public function update(Brand $brand): stdClass
    {
        return (object) $this->brandRepository->update($brand)->toArray();
    }

    public function delete(int $id): bool
    {
        return $this->brandRepository->delete($id);
    }

    public function find(int $id): stdClass
    {
        return (object) $this->brandRepository->find($id)->toArray();
    }

    public function findAll(int $page): Collection
    {
        return (object) $this->brandRepository->findAll($page);
    }
}
