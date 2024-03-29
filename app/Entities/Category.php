<?php

namespace App\Entities;

class Category implements EntityInterface
{
    public function __construct(
        public int $id,
        public string $name,
        public int $father,
        public ?string $createdAt,
        public ?string $updatedAt,
    ) {}

    public static function makeFromArray(array $data): Category
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            father: $data['father'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'father'=> $this->father,
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}