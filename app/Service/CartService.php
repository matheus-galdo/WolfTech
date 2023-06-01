<?php

namespace App\Service;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\UserDataObject;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;

class CartService
{
    public function addProductToCart(UserDataObject $user)
    {
        //TODO: receive product as argument
        $product = Product::where('name', 'ilike', '%teste%')->first();


        $cart = $this->getOrCreateCart($user);
        $addedProduct = $this->createProductCart($cart, $product);

        return $addedProduct;
    }

    public function getOrCreateCart(UserDataObject $user): CartDataObject
    {
        //TODO: move to a repository
        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
        ]);

        $cartData = new CartDataObject($cart->id, $cart->user_id);
        return $cartData;
    }


    public function createProductCart(CartDataObject $cart, Product $product): CartProductDataObject
    //TODO: cart service to add new product
    {
        //TODO: move to a repository
        $addedProduct = CartProduct::firstOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $product->id
            ],
            [
                'ammount' => 1,
            ]
        );

        //business rules
        if (!$addedProduct->wasRecentlyCreated) {
            //TODO: move to a repository
            $addedProduct->ammount += 1;
            $addedProduct->save();
        }

        return new CartProductDataObject(
            id: $addedProduct->id,
            ammount: $addedProduct->ammount,
            cartId: $addedProduct->cart_id,
            productId: $addedProduct->product_id,
        );
    }
}