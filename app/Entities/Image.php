<?php

namespace App\Entities;

class Image implements EntityInterface
{
    public function __construct(
        public int $id,
        public string $description,
        public int $skuId,
        public string $uri,
        public int $position,
        public ?string $createdAt,
        public ?string $updatedAt,
    ) {}

    public static function makeFromArray(array $data): Image
    {
        return new self(
            id: $data['id'],
            description: $data['description'],
            skuId: $data['sku_id'],
            uri: $data['uri'],
            position: $data['position'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'description'=> $this->description,
            'sku_id'=> $this->skuId,
            'uri'=> $this->uri,
            'position'=> $this->position,
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}