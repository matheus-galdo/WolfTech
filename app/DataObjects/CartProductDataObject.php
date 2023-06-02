<?php

declare(strict_types=1);

namespace App\DataObjects;

use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class CartProductDataObject implements DataObjectContract, JsonSerializable
{
    use HasSerialize;
    public function __construct(
        public readonly ?int $id,
        public readonly int $ammount,
        public readonly int $cartId,
        public readonly UuidInterface $productId,

        public readonly ?ProductDataObject $product,
    ) {
    }
    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        $cartProduct = [
            'id' => $this->id,
            'ammount' => $this->ammount,
            'cartId' => $this->cartId,
            'productId' => $this->productId,
        ];

        if (isset($this->product)) {
            $cartProduct['product'] = $this->product;
        }

        return $cartProduct;
    }
}