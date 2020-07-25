<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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