<?php

namespace App\Entities;

class Brand implements EntityInterface
{
    public function __construct(
        public int $id,
        public string $name,
        public float $relevancy,
        public ?string $createdAt,
        public ?string $updatedAt,
    ) {}

    public static function makeFromArray(array $data): Brand
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            relevancy: $data['relevancy'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'relevancy'=> $this->relevancy,
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}