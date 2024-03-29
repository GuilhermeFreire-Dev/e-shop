<?php

namespace App\Repositories\Cart;

use App\Entities\CartItem;
use Illuminate\Support\Collection;

interface CartItemRepositoryInterface
{
    public function create(CartItem $cartItem): CartItem;
    public function update(CartItem $cartItem): CartItem;
    public function delete(CartItem $cartItem): bool;
    public function findAll(int $cartId): Collection;
}