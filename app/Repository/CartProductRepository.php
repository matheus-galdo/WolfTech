<?php

namespace App\Repository;

use App\DataObjects\EntitiesDTO\CartDataObject;
use App\DataObjects\EntitiesDTO\CartProductDataObject;
use App\DataObjects\EntitiesDTO\ProductDataObject;
use App\DataObjects\Inputs\CartProductInputDTO;
use App\Models\CartProduct;

class CartProductRepository
{
    /**
     * Create a new CartProduct
     */
    public function createCartProduct(CartDataObject $cart, CartProductInputDTO $cartProduct): CartProductDataObject
    {
        $cartProductAdded = CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $cartProduct->product->id,
            'ammount' => $cartProduct->ammount,
        ]);

        return CartProductDataObject::fromModel($cartProductAdded, $cartProduct->product);
    }

    /**
     * Get CartProduct by its id
     */
    public function getCartProduct($id): CartProductDataObject|null
    {
        $cartProduct = CartProduct::with('product')->first($id);

        if (is_null($cartProduct)) {
            return null;
        }

        return CartProductDataObject::fromModel($cartProduct, $cartProduct->product);
    }

    /**
     * Find a CartProduct by the product and cart id
     */
    public function findCartProduct(ProductDataObject $product, int $cartId): CartProductDataObject|null
    {
        $cartProduct = CartProduct::with('product')
            ->where('product_id', $product->id)
            ->firstWhere('cart_id', $cartId);

        if (is_null($cartProduct)) {
            return null;
        }

        return CartProductDataObject::fromModel($cartProduct, $product);
    }

    /**
     * Updates the ammount column of a given cartProduct
     */
    public function updateAmmount(CartProductDataObject $cartProduct, int $newAmmount): CartProductDataObject
    {
        CartProduct::where('id', $cartProduct->id)
            ->update(['ammount' => $newAmmount]);

        $updatedCartProduct = CartProduct::with('product')->find($cartProduct->id);
        return CartProductDataObject::fromModel($updatedCartProduct, $updatedCartProduct->product);
    }
}
