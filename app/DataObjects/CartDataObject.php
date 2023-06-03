<?php

declare(strict_types=1);

namespace App\DataObjects;

use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class CartDataObject implements DataObjectContract, JsonSerializable
{
    use HasSerialize;
    public function __construct(
        public readonly ?int $id,
        public readonly UuidInterface $userId,
        public readonly mixed $cartProducts = []
    ) {
    }

    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        $cart = [
            'id' => $this->id,
            'userId' => $this->userId,
        ];

        $cart['cartProducts'] = $this->parseProducts();
        return $cart;
    }

    /**
     * Create DTOs for products on cart
     *
     * @return CartProductDataObject[]
     */
    private function parseProducts()
    {
        $cartProducts = [];
        foreach ($this->cartProducts as $item) {
            $product = new ProductDataObject(
                id: $item->id,
                name: $item->name,
                description: $item->description,
                price: $item->price,
                imageUrl: $item->imageUrl,
            );

            $cartProduct = new CartProductDataObject(
                id: $item->pivot->id,
                ammount: $item->pivot->ammount,
                cartId: $item->pivot->cart_id,
                productId: $item->id,
                product: $product,
            );

            array_push($cartProducts, $cartProduct);
        }
        return $cartProducts;
    }
}