<?php

namespace App\Repository;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\ProductDataObject;
use App\DataObjects\UserDataObject;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;

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

    public function createProductCart(CartDataObject $cart, Product $product): CartProductDataObject
    {
        //TODO: move to another repository?
        $addedProduct = CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'ammount' => 1,
        ]);

        $productData = new ProductDataObject(
            id: $product->id,
            name: $product->name,
            description: $product->description,
            price: $product->price,
            imageUrl: $product->imageUrl
        );

        return new CartProductDataObject(
            id: $addedProduct->id,
            ammount: $addedProduct->ammount,
            cartId: $addedProduct->cart_id,
            productId: $addedProduct->product_id,
            product: $productData
        );
    }
}