<?php

namespace App\Entities;
use Illuminate\Support\Collection;

class Product implements EntityInterface
{
    public function __construct(
        public string $name,
        public string $description,
        public int $brandId,
        public int $categoryId,
        public Collection $skus = new Collection(),
        public ?int $id = null,
    ) {}

    public static function makeFromArray(array $data): Product
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'],
            brandId: $data['brand_id'],
            categoryId: $data['category_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'brand_id'=> $this->brandId,
            'category_id'=> $this->categoryId,
        ];
    }
}