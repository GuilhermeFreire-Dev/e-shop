<?php

namespace App\Entities;

interface EntityInterface
{
    public static function makeFromArray(array $data): EntityInterface;
    public function toArray(): array;
}