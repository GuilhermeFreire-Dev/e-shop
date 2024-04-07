<?php

namespace App\Entities;

class CartItem implements EntityInterface
{
    public function __construct(
        public int $id,
        public int $cartId,
        public int $sku,
        public ?string $createdAt,
        public ?string $updatedAt,
    ) {}

    public static function makeFromArray(array $data): CartItem
    {
        return new self(
            id: $data['id'],
            cartId: $data['cart_id'],
            sku: $data['sku_id'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'cart_id'=> $this->cartId,
            'sku_id'=> $this->sku,
            'created_at'=> $this->createdAt,
            'updated_at'=> $this->updatedAt,
        ];
    }
}