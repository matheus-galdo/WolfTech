<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

class AdminRoutes {
    public static function registerRoutes() {
        Route::post('products', [ProductController::class, 'store']);
    }
}
