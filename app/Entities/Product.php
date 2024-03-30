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
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
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
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
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
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}