<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function home(): View{
        return view('user/dashboard');
    }
}
