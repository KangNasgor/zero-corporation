<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductsController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
Route::view('/', 'dashboard')->name('home');
Route::controller(ProductsController::class)->group(function(){
    Route::get('/products', 'home')->name('products');
    Route::get('/productsAPI', 'api');
    Route::get('/products/search', 'search')->name('products.search');
    Route::get('/products/create', 'createView')->name('create-products');
    Route::post('/products/create/store', 'create');
    Route::get('/products/edit/{id}', 'updateView')->name('products.editpage');
    Route::put('/products/edit/update/{id}', 'update')->name('products.edit');
    Route::get('/products/history', 'history')->name('products.history');
    Route::put('/products/softdel/{id}', 'softdelete')->name('products.softdelete');
    Route::put('/products/restore/{id}', 'restore')->name('products.restore');
});
Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employee', 'employee')->name('employee');
});