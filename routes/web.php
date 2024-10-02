<?php

use App\Http\Controllers\ProductsController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
Route::view('/', 'dashboard');
Route::controller(ProductsController::class)->group(function(){
    Route::get('/products', 'home')->name('products');
    Route::get('/productsAPI', 'api');
    Route::get('/products/search', 'search')->name('products.search');
    Route::get('/products/create', 'createView')->name('create-products');
    Route::post('/products/create/store', 'create');
});