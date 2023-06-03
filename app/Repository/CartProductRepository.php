<?php

namespace App\Repository;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\ProductDataObject;
use App\Models\CartProduct;

class CartProductRepository
{
    /**
     * Create a new CartProduct
     * @param \App\DataObjects\CartDataObject $cart
     * @param \App\DataObjects\CartProductDataObject $cartProduct
     * @return \App\DataObjects\CartProductDataObject
     */
    public function createCartProduct(CartDataObject $cart, CartProductDataObject $cartProduct): CartProductDataObject
    {
        $cartProductAdded = CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $cartProduct->product->id,
            'ammount' => $cartProduct->ammount,
        ]);

        return $this->makeCartProductDataObject($cartProductAdded, $cartProduct->product);
    }

    /**
     * Get CartProduct by its id
     * @param mixed $id
     * @return CartProductDataObject|null
     */
    public function getCartProduct($id)
    {
        $cartProduct = CartProduct::with('product')->first($id);

        if (is_null($cartProduct)) {
            return null; //TODO!: throw error?
        }

        return $this->makeCartProductDataObject($cartProduct, $cartProduct->product);
    }

    /**
     * Find a CartProduct by the product and cart id
     * @param \App\DataObjects\ProductDataObject $product
     * @param mixed $cartId
     * @return CartProductDataObject|null
     */
    public function getCartProductByProductAndCartId(ProductDataObject $product, int $cartId)
    {
        $cartProduct = CartProduct::with('product')
            ->where('product_id', $product->id)
            ->firstWhere('cart_id', $cartId);

        if (is_null($cartProduct)) {
            return null;
        }

        return $this->makeCartProductDataObject($cartProduct, $product);
    }

    /**
     * Updates the ammount column of a given cartProduct
     * @param \App\DataObjects\CartProductDataObject $cartProduct
     * @param mixed $newAmmount
     * @return CartProductDataObject
     */
    public function updateAmmount(CartProductDataObject $cartProduct, int $newAmmount)
    {
        CartProduct::where('id', $cartProduct->id)
            ->update(['ammount' => $newAmmount]);

        $updatedCartProduct = CartProduct::with('product')->find($cartProduct->id);
        return $this->makeCartProductDataObject($updatedCartProduct, $updatedCartProduct->product);
    }

    /**
     * Instatiate the DTO to the cartProduct model
     * @param mixed $cartProduct
     * @param mixed $product
     * @return CartProductDataObject
     */
    public function makeCartProductDataObject(mixed $cartProduct, $product)
    {
        return new CartProductDataObject(
            id: $cartProduct->id,
            ammount: $cartProduct->ammount,
            cartId: $cartProduct->cart_id,
            productId: $cartProduct->product_id,
            product: $product,
        );
    }
}