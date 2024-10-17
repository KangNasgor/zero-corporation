<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    public function loginUserView(): View{
        return view('user/loginUser');
    }
}
