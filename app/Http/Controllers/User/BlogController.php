<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function blog(): View{
        return view('user.blog');
    }
}
