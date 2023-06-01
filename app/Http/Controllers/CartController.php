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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $userData = new UserDataObject(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            password: '',
        );
  
        $cart = new CartService();
        $addedProduct = $cart->addProductToCart($userData);
        return response()->json(status: 201, data: $addedProduct);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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