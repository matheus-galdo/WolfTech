<?php

namespace App\Service;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\ProductDataObject;
use App\DataObjects\UserDataObject;
use App\Models\Product;
use App\Repository\CartProductRepository;
use App\Repository\CartRepository;

class CartService
{
    public function __construct(
        public CartRepository $cartRepository,
        public CartProductRepository $cartProductRepository
    ) {
    }

    /**
     * Display a cart with its products for a given user.
     *
     * @param UserDataObject $user
     * @return CartDataObject
     */
    public function getCartWithProducts(UserDataObject $user)
    {
        return $this->cartRepository->getUserCart($user);
    }


    public function addProductToCart(UserDataObject $user, ProductDataObject $product, $ammount)
    {
        $cart = $this->cartRepository->getOrCreateCart($user);
        $cartProduct = $this->cartProductRepository->getCartProductByProductAndCartId($product, $cart->id);

        if (is_null($cartProduct)) {
            $newCartProduct = new CartProductDataObject(
                id: null,
                ammount: $ammount,
                cartId: $cart->id,
                productId: $product->id,
                product: $product
            );

            $addedProduct = $this->cartRepository->addProduct($cart, $newCartProduct);
            return $addedProduct;
        }
        

        //if produto already exist
            //sum product ammount
    }
}