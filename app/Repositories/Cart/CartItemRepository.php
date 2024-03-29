<?php

namespace App\Repositories\Cart;

use App\Entities\CartItem;
use \App\Models\CartItem as Model;
use Illuminate\Support\Collection;

class CartItemRepository implements CartItemRepositoryInterface
{
    public function __construct(
        private Model $cartItem
    ) {}

    public function create(CartItem $cartItem): CartItem
    {
        $newCartItem = $this->cartItem->create($cartItem->toArray());
        return CartItem::makeFromArray($newCartItem->toArray());
    }

    public function update(CartItem $cartItem): CartItem
    {
        $this->cartItem->findOrFail($cartItem->id)->update($cartItem->toArray());
        return $cartItem;
    }

    public function delete(CartItem $cartItem): bool
    {
        return $this->cartItem->findOrFail($cartItem->id)->delete();
    }

    public function findAll(int $cartId): Collection
    {
        return $this->cartItem->where('cart_id', $cartId)->get();
    }
}