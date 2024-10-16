<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginUserController extends Controller
{
    public function loginUserView(): View{
        return view('loginUser');
    }
}
