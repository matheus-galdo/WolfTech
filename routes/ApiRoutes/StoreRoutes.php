<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

class StoreRoutes
{
    public static function registerRoutes()
    {
        //public routes
        Route::get('products', [ProductController::class, 'index']);
        Route::get('products/{product}', [ProductController::class, 'show']);


        // protected routes
        Route::middleware(['auth:api'])->group(function () {
            Route::post('cart', [CartController::class, 'addProduct']);
            Route::get('cart', [CartController::class, 'getCart']);
        });
    }
}
