<?php

use App\Http\Controllers\User\ProfileUserController;
use App\Http\Middleware\UserVerificationMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Products\ProductsController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\User\DashboardContentController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Middleware\AdminRoleMiddleware;
use App\Http\Middleware\SuperAdminRoleMiddleware;
use App\Http\Middleware\UserAuthMiddleware;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// Admin routes below
Route::middleware(['auth:admin', SuperAdminRoleMiddleware::class.':3'])->group(function(){
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

Route::middleware(['auth:admin', AdminRoleMiddleware::class.':2,3'])->group(function(){
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
    Route::controller(UserDashboardController::class)->group(function(){
        Route::get('/dashboarduser', 'dashboarduser')->name('dashboarduser');
        Route::get('/dashboarduser/create', 'createDashboardView')->name('dashboardCreateView');
        Route::post('/dashboarduser/create/submit', 'createDashboard')->name('dashboard.create');
        Route::get('/dashboard/update/{id}', 'updateDashboardView')->name('dashboardUpdateView');
        Route::put('/dashboard/update/submit/{id}', 'updateDashboard')->name('dashboard.update');
        Route::get('/dashboard/history', 'dashboardHistory')->name('dashboard.history');
        Route::put('/dashboard/softdelete/{id}', 'dashboardSoftDelete')->name('dashboard.sotfdelete');
        Route::put('/dashboard/restore/{id}', 'dashboardRestore')->name('dashboard.restore');
        Route::delete('/dashboard/delete/{id}', 'dashboardDelete')->name('dashboard.delete');
    });
    Route::controller(DashboardContentController::class)->group(function(){
        Route::get('/dashboardcontent', 'dashboardContent')->name('dashboardcontent');
        Route::get('/dashboardcontent/search', 'search')->name('dashboardcontent.search');
        Route::get('/dashboardcontent/create', 'createView')->name('dashboardcontent.create');
        Route::post('/dashboardcontent/create/store', 'create');
        Route::get('/dashboardcontent/edit/{id}', 'updateView')->name('dashboardcontent.editpage');
        Route::put('/dashboardcontent/edit/update/{id}', 'update')->name('dashboardcontent.edit');
        Route::get('/dashboardcontent/history', 'history')->name('dashboardcontent.history');
        Route::put('/dashboardcontent/softdel/{id}', 'softdelete')->name('dashboardcontent.softdelete');
        Route::put('/dashboardcontent/restore/{id}', 'restore')->name('dashboardcontent.restore');
        Route::delete('/dashboardcontent/delete/{id}', 'delete')->name('dashboardcontent.delete');
    });
    
});

// User register below
Route::middleware([UserAuthMiddleware::class, UserVerificationMiddleware::class])->group(function(){
        // User verification
    Route::get('email/verify', [AuthUserController::class, 'verificationNotice'])->withoutMiddleware(UserVerificationMiddleware::class)->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [AuthUserController::class, 'verify'])->withoutMiddleware(UserVerificationMiddleware::class)->name('verification.verify');
    Route::post('email/resend', [AuthUserController::class, 'resend'])->name('verification.resend');
    Route::get('/dashboard', [UserDashboardController::class, 'home'])->name('dashboard.user');
    // User logout
    Route::get('/logout/user', [AuthUserController::class, 'logout'])->name('logout.user');
    // User Profile
    Route::get('/profile/user', [ProfileUserController::class, 'profile'])->name('profile.user');
    Route::put('/profile/user/update/{id}', [ProfileUserController::class, 'edit'])->name('profile.update');
});
Route::middleware(['web'])->group(function(){
    // User registration
    Route::get('/register', [RegisterUserController::class, 'registerUserView'])->withoutMiddleware(UserAuthMiddleware::class)->name('registerUserView');
    Route::post('/register/user', [RegisterUserController::class, 'register'])->withoutMiddleware(UserAuthMiddleware::class)->name('register.user');
    // User login
    Route::get('/login/user', [LoginUserController::class, 'loginUserView'])->withoutMiddleware(UserAuthMiddleware::class)->name('loginUserView');
    Route::post('/login/user/submit', [LoginUserController::class, 'login'])->withoutMiddleware(UserAuthMiddleware::class)->name('login.user');
    // Password reset
    Route::get('/change-password', function () {
        return view('user.auth.change-password');
    })->name('password.request');
    Route::post('/change-password', function (Request $request) {
        $request->validate(['email' => 'required|email']); // validate designated email 
        $status = Password::sendResetLink(
            $request->only('email') // sending reset link using laravel's password broker (Password) it retrieves user's record by defining users table in password in auth.php
        );
        return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]); 
    })->name('password.email'); // if reset password link is sent user can open their email to find the reset link
    Route::get('/reset-password/{token}', function (string $token) {
        return view('user.auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]); // validate 
     
        $status = Password::reset( // reset is Password's static method, it accepts two params, creds array and closure (anon function) that defines how to handle user reset password
            $request->only('email', 'password', 'password_confirmation', 'token'), // retrieving request
            function (User $user, string $password) { // executes when password reset is successful 
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user)); // listening to $user
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});
// Login admin below
Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login/admin', [LoginController::class, 'loginAdmin'])->name('login.admin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
