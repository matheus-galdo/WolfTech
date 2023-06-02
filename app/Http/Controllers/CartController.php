<?php

namespace App\Http\Controllers;

use App\DataObjects\CartProductDataObject;
use App\DataObjects\ProductDataObject;
use App\DataObjects\UserDataObject;
use App\Models\Product;
use App\Service\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $user;
    public function __construct(public CartService $cartService)
    {
        $this->user = Auth::user();
    }


    /**
     * Display a cart with its products for a given user.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCart()
    {
        $userData = new UserDataObject(
            id: $this->user->id,
            name: $this->user->name,
            email: $this->user->email,
            password: '',
        );

        $products = $this->cartService->getCartWithProducts($userData);
        return response()->json(status: 200, data: $products);
    }

    /**
     * Add a new Product to the user cart
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function addProduct(Request $request, Product $product)
    {
        $ammount = (int) $request->input('ammount');
        $userData = new UserDataObject(
            id: $this->user->id,
            name: $this->user->name,
            email: $this->user->email,
            password: '',
        );

        $productData = new ProductDataObject(
            id: $product->id,
            name: $product->name,
            description: $product->description,
            price: $product->price,
            imageUrl: $product->imageUrl,
        );

        $addedProduct = $this->cartService->addProductToCart($userData, $productData, $ammount);
        return response()->json(status: 201, data: $addedProduct);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}