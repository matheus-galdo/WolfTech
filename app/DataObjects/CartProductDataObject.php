<?php

declare(strict_types=1);

namespace App\DataObjects;

use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class CartProductDataObject implements DataObjectContract
{
    public function __construct(
        public readonly ?int $id,
        public readonly int $ammount,
        public readonly int $cartId,
        public readonly UuidInterface $productId,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ammount' => $this->ammount,
            'cartId' => $this->cartId,
            'productId' => $this->productId,
        ];
    }
}
