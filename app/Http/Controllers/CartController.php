<?php

namespace App\Http\Controllers;

use App\DataObjects\Inputs\CartProductInputDTO;
use App\DataObjects\EntitiesDTO\UserDataObject;
use App\DataObjects\EntitiesDTO\ProductDataObject;
use App\Http\Requests\CartAddProductRequest;
use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Service\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected UserDataObject $user;

    public function __construct(public CartService $cartService)
    {
        $user = Auth::user();
        $this->user = new UserDataObject(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            password: '',
        );
    }

    /**
     * Display a cart with its products for a given user.
     */
    public function getCart()
    {
        $products = $this->cartService->getCartWithProducts($this->user);
        return response()->json(status: 200, data: $products);
    }

    /**
     * Add a new Product to the user cart
     */
    public function addProduct(CartAddProductRequest $request)
    {
        $cartInput = CartProductInputDTO::buildFromRequest($request);
        $addedProduct = $this->cartService->addProductToCart($this->user, $cartInput);
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
