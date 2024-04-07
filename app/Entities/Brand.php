<?php

namespace App\Entities;

class Brand implements EntityInterface
{    
    public function __construct(
        public string $name,
        public float $relevancy,
        public ?int $id = null,
    ) { }

    public static function makeFromArray(array $data): Brand
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            relevancy: $data['relevancy'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'relevancy'=> $this->relevancy,
        ];
    }
}