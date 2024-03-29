<?php

namespace App\Repositories\Cart;

use App\Entities\Cart;

interface CartRepositoryInterface
{
    public function create(Cart $cart): Cart;
    public function update(Cart $cart): Cart;
    public function find(int $id): Cart;
}