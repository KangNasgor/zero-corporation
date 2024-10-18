<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    public function loginUserView(): View{
        return view('user/loginUser');
    }
    public function login(Request $req){
        $user = User::where('name', $req->name)->first();
        if(!$user){
            return redirect()->route('loginUserView')->with('account-404','Akun tidak ditemukan.');
        }
        else{
            if(Auth::guard('web')->attempt(['name' => $req->name, 'password' => $req->password])){
                Auth::login($user);
                return redirect()->route('dashboard.user');
            }
            else{
                return redirect()->route('loginUserView')->with('creds-failed', 'Username/Password salah.');
            }
        }
    }
}
