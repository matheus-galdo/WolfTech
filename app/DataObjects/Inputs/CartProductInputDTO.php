<?php

declare(strict_types=1);

namespace App\DataObjects\Inputs;

use App\DataObjects\EntitiesDTO\ProductDataObject;
use App\DataObjects\HasSerialize;
use App\Models\Product;
use Illuminate\Http\Request;
use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class CartProductInputDTO implements DataObjectContract, JsonSerializable, InputContract
{
    use HasSerialize;
    public function __construct(
        public readonly int $ammount,
        public readonly UuidInterface $productId,
        public readonly int|null $cartId,

        public ProductDataObject|Product|null $product,
    ) {
    }

    public static function buildFromRequest(Request $request)
    {
        return new CartProductInputDTO(
            ammount: $request->input('ammount'),
            productId: Uuid::fromString($request->input('productId')),
            cartId: null,
            product: null,
        );
    }

    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        $cartProduct = [
            'ammount' => $this->ammount,
            'productId' => $this->productId,
        ];

        if (isset($this->product)) {
            $cartProduct['cartId'] = $this->cartId;
        }

        if (isset($this->product)) {
            $cartProduct['product'] = $this->product;
        }

        return $cartProduct;
    }
}
