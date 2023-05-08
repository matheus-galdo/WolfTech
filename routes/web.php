<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('loja/home');
});

Route::get('produto/detalhes', function () {
    return view('loja/produto', [
        'nomeProduto' => 'Processador i5 8400'
    ]);
});

Route::get('buscar/', function ($pesquisar) {
    echo $pesquisar;
});