<?php

namespace App\Entities;
use Illuminate\Support\Collection;

class Cart implements EntityInterface
{
    public function __construct(
        public int $id,
        public ?string $createdAt,
        public ?string $updatedAt,
        public Collection $items = new Collection(),
    ) {}

    public static function makeFromArray(array $data): Cart
    {
        return new self(
            id: $data['id'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}