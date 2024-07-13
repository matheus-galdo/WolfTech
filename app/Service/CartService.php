<?php

namespace App\Service;

use App\DataObjects\EntitiesDTO\CartDataObject;
use App\DataObjects\EntitiesDTO\CartProductDataObject;
use App\DataObjects\EntitiesDTO\ProductDataObject;
use App\DataObjects\EntitiesDTO\UserDataObject;
use App\DataObjects\Inputs\CartProductInputDTO;
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
     */
    public function getCartWithProducts(UserDataObject $user)
    {
        return $this->cartRepository->getUserCart($user);
    }


    /**
     * Adds or increase the ammount of a ProductCart for a given product
     */
    public function addProductToCart(UserDataObject $user, CartProductInputDTO $cartInput): CartProductDataObject
    {
        $product = Product::findOrFail($cartInput->productId);
        $productData = ProductDataObject::fromModel($product);

        $cart = $this->cartRepository->getOrCreateCart($user);
        $cartProduct = $this->cartProductRepository->findCartProduct($productData, $cart->id);

        if (is_null($cartProduct)) {
            $newCartProduct = new CartProductInputDTO(
                ammount: $cartInput->ammount,
                cartId: $cart->id,
                productId: $product->id,
                product: $product
            );

            return $this->cartRepository->addProduct($cart, $newCartProduct);
        }

        $newAmmount = $cartProduct->ammount + $cartInput->ammount;
        return $this->cartProductRepository->updateAmmount($cartProduct, $newAmmount);
    }
}
