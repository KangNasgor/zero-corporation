<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileUserController extends Controller{
    public function profile(): View{
        return view('user.profile.profile');
    }
}