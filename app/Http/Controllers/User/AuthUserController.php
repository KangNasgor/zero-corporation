<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->route('dashboard.user');
    }
    public function verificationNotice(){
        if (Auth::check()) {
            if (Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('dashboard.user');
            } else {
                return view('user.auth.verify-email');
            }
        }
        return redirect()->route('login');
    }
    public function resend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resent', 'Sudah dikirim masbro');
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('loginUserView');
    }
}
