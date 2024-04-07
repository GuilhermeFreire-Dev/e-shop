<?php

namespace App\Entities;

class Category implements EntityInterface
{
    public function __construct(
        public string $name,
        public ?int $father = null,
        public ?int $id = null,
    ) {}

    public static function makeFromArray(array $data): Category
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            father: $data['father'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'father'=> $this->father,
        ];
    }
}