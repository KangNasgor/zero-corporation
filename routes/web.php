<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Products\ProductsController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\RegisterUserController;
use App\Http\Middleware\AdminRoleMiddleware;
use App\Http\Middleware\SuperAdminRoleMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::middleware(['web', SuperAdminRoleMiddleware::class.':3'])->group(function(){
    Route::get('/', [RegisterController::class, 'registerView'])->name('register');
    Route::post('/home', [RegisterController::class, 'registerAdmin'])->name('register.add');
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin', 'home')->name('admin');
        Route::get('/admin/search', 'search')->name('admin.search');
        Route::get('/admin/create', 'createView')->name('admin.create');
        Route::post('/admin/create/store', 'create');
        Route::get('/admin/edit/{id}', 'updateView')->name('admin.editpage');
        Route::put('/admin/edit/update/{id}', 'update')->name('admin.edit');
        Route::get('/admin/history', 'history')->name('admin.history');
        Route::put('/admin/softdel/{id}', 'softdelete')->name('admin.softdelete');
        Route::put('/admin/restore/{id}', 'restore')->name('admin.restore');
        Route::delete('/admin/delete/{id}', 'delete')->name('admin.delete');
    });
});

Route::middleware([AdminRoleMiddleware::class.':2,3'])->group(function(){
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
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
        Route::get('/employee/search', 'search')->name('employee.search');
        Route::get('/employee/create', 'createView')->name('employee.create');
        Route::post('/employee/create/store', 'create');
        Route::get('/employee/edit/{id}', 'updateView')->name('employee.editpage');
        Route::put('/employee/edit/update/{id}', 'update')->name('employee.edit');
        Route::get('/employee/history', 'history')->name('employee.history');
        Route::put('/employee/softdel/{id}', 'softdelete')->name('employee.softdelete');
        Route::put('/employee/restore/{id}', 'restore')->name('employee.restore');
        Route::delete('/employee/delete/{id}', 'delete')->name('employee.delete');
    });
});

Route::get('/register', [RegisterUserController::class, 'registerUserView'])->name('registerUserView');
Route::post('/register/user', [RegisterUserController::class, 'register'])->name('register.user');
Route::get('email/verify', function () {
    return view('user/auth/verify-email');
})->name('verification.notice');

Route::get('email/verify/{id}/{hash}', [AuthUserController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [AuthUserController::class, 'resend'])->name('verification.resend');

Route::get('/dashboard', [UserDashboardController::class, 'home'])->name('dashboard.user');

// Login admin below
Route::get('/login', [LoginController::class, 'loginView'])->name('loginView');
Route::post('/login/admin', [LoginController::class, 'loginAdmin'])->name('login.admin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
