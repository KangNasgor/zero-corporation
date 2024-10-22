<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Hash;
class RegisterUserController extends Controller
{
    public function registerUserView(): View{
        return view('user/registerUser');
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        event(new Registered($user)); // This send an email to the designated email
        return redirect()->route('verification.notice'); // Redirect to verification page
    }
}
