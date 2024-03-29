<?php

namespace App\Entities;
use Illuminate\Support\Collection;

class Sku implements EntityInterface
{
    public function __construct(
        public int $id,
        public int $productId,
        public string $name,
        public string $size,
        public string $color,
        public string $hex,
        public int $tissue,
        public float $lastPrice,
        public float $currentPrice,
        public int $quantity,
        public ?string $createdAt,
        public ?string $updatedAt,
        public Collection $images = new Collection(),
    ) {}

    public function makeFromArray(array $data): Sku
    {
        return new self(
            id: $data['id'],
            productId: $data['product_id'],
            name: $data['name'],
            size: $data['size'],
            color: $data['color'],
            hex: $data['hex'],
            tissue: $data['tissue'],
            lastPrice: $data['last_price'],
            currentPrice: $data['current_price'],
            quantity: $data['quantity'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'product_id'=> $this->productId,
            'name'=> $this->name,
            'size'=> $this->size,
            'color'=> $this->color,
            'hex'=> $this->hex,
            'tissue'=> $this->tissue,
            'last_price'=> $this->lastPrice,
            'current_price'=> $this->currentPrice,
            'quantity'=> $this->quantity,
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}