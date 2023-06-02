<?php

namespace App\Repository;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\UserDataObject;
use App\Models\Cart;

class CartRepository
{
    /**
     * Return a CartDataObject with all its products
     * @param \App\DataObjects\UserDataObject $user
     * @return CartDataObject
     */
    public function getUserCart(UserDataObject $user): CartDataObject
    {
        $cart = Cart::where('user_id', $user->id)->with(['products'])->firstOrFail();
        return new CartDataObject(
            id: $cart->id,
            userId: $cart->user_id,
            cartProducts: $cart->products,
        );
    }

    /**
     * Return a existing cart or create a new one and return it
     * @param \App\DataObjects\UserDataObject $user
     * @return \App\DataObjects\CartDataObject
     */
    public function getOrCreateCart(UserDataObject $user): CartDataObject
    {
        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
        ]);

        return new CartDataObject($cart->id, $cart->user_id);
    }

    /**
     * Create a new CartProduct
     *
     * @param CartDataObject $cart
     * @param CartProductDataObject $product
     * @return CartProductDataObject
     */
    public function addProduct(CartDataObject $cart, CartProductDataObject $cartProduct): CartProductDataObject
    {
        $cartProductRepository = new CartProductRepository();
        return $cartProductRepository->createCartProduct($cart, $cartProduct);
    }
}