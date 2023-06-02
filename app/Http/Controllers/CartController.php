<?php

namespace App\Http\Controllers;

use App\DataObjects\UserDataObject;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Service\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class CartController extends Controller
{
    protected $user;
    public function __construct(public CartService $cartService)
    {
        $this->user = Auth::user();
    }

    /**
     * Display a cart with its products for a given user.
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
     * Store a newly created resource in storage.
     */
    public function addProduct(Request $request)
    {

        $userData = new UserDataObject(
            id: $this->user->id,
            name: $this->user->name,
            email: $this->user->email,
            password: '',
        );
  
        $addedProduct = $this->cartService->addProductToCart($userData);
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