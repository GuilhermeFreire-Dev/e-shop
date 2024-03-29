<?php

namespace App\Repositories\Cart;

use App\Entities\Cart;
use \App\Models\Cart as Model;

class CartRepository implements CartRepositoryInterface
{
    public function __construct(
        private Model $cart
    ) {}

    public function create(Cart $cart): Cart
    {
        $newCart = $this->cart->create($cart->toArray());
        return Cart::makeFromArray($newCart->toArray());
    }

    public function update(Cart $cart): Cart
    {
        $this->cart->findOrFail($cart->id)->update($cart->toArray());
        return $cart;
    }

    public function find(int $cartId): Cart
    {
        return Cart::makeFromArray($this->cart->findOrFail($cartId)->toArray());
    }
}