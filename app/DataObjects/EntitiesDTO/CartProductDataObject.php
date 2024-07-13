<?php

declare(strict_types=1);

namespace App\DataObjects\EntitiesDTO;

use App\DataObjects\HasSerialize;
use App\Models\CartProduct;
use App\Models\Product;
use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class CartProductDataObject implements DataObjectContract, JsonSerializable
{
    public readonly ?ProductDataObject $product;
    
    use HasSerialize;
    public function __construct(
        public readonly int $id,
        public readonly int $ammount,
        public readonly int $cartId,
        public readonly UuidInterface $productId,

        ProductDataObject|Product|null $product,
    ) {
        if ($product instanceof Product || $product instanceof ProductDataObject) {
            $this->product = new ProductDataObject(
                id: $product->id,
                name: $product->name,
                description: $product->description,
                price: $product->price,
                imageUrl: $product->imageUrl,
            );
        }
    }

    public static function fromModel(CartProduct $cartProduct, ProductDataObject|Product|null $product)
    {
        return new CartProductDataObject(
            id: $cartProduct->id,
            ammount: $cartProduct->ammount,
            cartId: $cartProduct->cart_id,
            productId: $cartProduct->product_id,
            product: $product ?? null,
        );
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
