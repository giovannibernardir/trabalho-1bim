<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductItensController;
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
    return view('welcome');
});

// Lista todos os produtos junto com seus itens (rota via classe de controller).
Route::resource('products', ProductController::class);

Route::resource('product-itens', ProductItensController::class)
    ->parameters(['product-itens' => 'productItens']);
