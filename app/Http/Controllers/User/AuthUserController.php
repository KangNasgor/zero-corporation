<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public function sendToken(Request $request){
        $request->validate(['email' => 'required|email']); // validate designated email 
        $status = Password::sendResetLink(
            $request->only('email') // sending reset link using laravel's password broker (Password) it retrieves user's record by defining users table in password in auth.php
        );
        return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]); 
    }
    public function changePasswordView (string $token) {
        return view('user.auth.reset-password', ['token' => $token]);
    }
    public function changePassword(Request $request) {
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
    }
}