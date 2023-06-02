<?php

namespace App\Service;

use App\DataObjects\CartDataObject;
use App\DataObjects\CartProductDataObject;
use App\DataObjects\UserDataObject;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Repository\CartRepository;

class CartService
{
    public function __construct(
        public CartRepository $cartRepository
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


    public function addProductToCart(UserDataObject $user)
    {
        //TODO: receive product as argument
        $product = Product::where('name', 'ilike', '%teste%')->first();


        $cart = $this->cartRepository->getOrCreateCart($user);
        // $addedProduct = $this->cartRepository->addProductToCart($cart, $product);

        // //business rules
        // if (!$addedProduct->wasRecentlyCreated) {
        //     //TODO: move to a repository
        //     $addedProduct->ammount += 1;
        //     $addedProduct->save();
        // }

        // return $addedProduct;
    }

    
    
}