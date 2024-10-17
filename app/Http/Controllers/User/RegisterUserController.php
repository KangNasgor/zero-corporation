<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class RegisterUserController extends Controller
{
    public function registerUserView(): View{
        return view('user/registerUser');
    }
}
