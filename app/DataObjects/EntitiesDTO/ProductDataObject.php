<?php

namespace App\DataObjects\EntitiesDTO;

use App\DataObjects\HasSerialize;
use App\Models\Product;
use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class ProductDataObject implements DataObjectContract, JsonSerializable
{
    use HasSerialize;
    /**
     * Summary of __construct
     * @param mixed $id
     * @param mixed $name
     * @param mixed $description
     * @param mixed $price
     * @param mixed $imageUrl
     */
    public function __construct(
        public readonly ?UuidInterface $id,
        public readonly string $name,
        public readonly string $description,
        public readonly float $price,
        public readonly string $imageUrl,
    ) {
    }

    public static function fromModel(Product $product) : ProductDataObject {
        return new ProductDataObject(
            id: $product->id,
            name: $product->name,
            description: $product->description,
            price: $product->price,
            imageUrl: $product->imageUrl,
        );
    }

    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'imageUrl' => $this->imageUrl,
            'id' => $this->id,
        ];
    }
}