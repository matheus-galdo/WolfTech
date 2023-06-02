<?php

namespace App\Repository;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\ProductDataObject;
use App\Models\CartProduct;
use App\Models\Product;
use Ramsey\Uuid\UuidInterface;

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
        
        return new CartProductDataObject(
            id: $cartProductAdded->id,
            ammount: $cartProductAdded->ammount,
            cartId: $cartProductAdded->cart_id,
            productId: $cartProductAdded->product_id,

            product: $cartProduct->product,
        );
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
            return null;
        }

        return new CartProductDataObject(
            id: $cartProduct->id,
            ammount: $cartProduct->ammount,
            cartId: $cartProduct->cart_id,
            productId: $cartProduct->product_id,
            product: $cartProduct->product,
        );
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

        return new CartProductDataObject(
            id: $cartProduct->id,
            ammount: $cartProduct->ammount,
            cartId: $cartProduct->cart_id,
            productId: $cartProduct->product_id,
            product: $product,
        );
    }
}