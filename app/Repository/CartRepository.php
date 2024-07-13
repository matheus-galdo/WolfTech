<?php

namespace App\Repository;

use App\DataObjects\EntitiesDTO\CartDataObject;
use App\DataObjects\EntitiesDTO\CartProductDataObject;
use App\DataObjects\EntitiesDTO\UserDataObject;
use App\DataObjects\Inputs\CartProductInputDTO;
use App\Models\Cart;

class CartRepository
{
    public function __construct(
        public readonly CartProductRepository $cartProductRepository
    ) {
    }

    /**
     * Return a CartDataObject with all its products
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
     */
    public function addProduct(CartDataObject $cart, CartProductInputDTO $cartProduct): CartProductDataObject
    {
        return $this->cartProductRepository->createCartProduct($cart, $cartProduct);
    }
}