<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
Route::get('/', [RegisterController::class, 'registerView'])->name('register');
Route::get('/login', [LoginController::class, 'loginView'])->name('loginView');
Route::post('/home', [RegisterController::class, 'registerAdmin'])->name('register.add');
Route::post('/login/admin', [LoginController::class, 'loginAdmin'])->name('login.admin');
Route::view('/home', 'dashboard')->name('home');
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
    Route::delete('/products/delete/{id}', 'delete')->name('products.delete');
});
Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employee', 'employee')->name('employee');
});