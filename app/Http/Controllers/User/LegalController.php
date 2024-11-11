<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function tos(){
        return view('user.legal.tos');
    }
    public function privacyPolicy(){
        return view('user.legal.privacy-policy');
    }
}
