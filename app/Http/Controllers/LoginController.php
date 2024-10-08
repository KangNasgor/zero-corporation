<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function loginView(): View
    {
        return view('login');
    }
    public function loginAdmin(Request $req)
    {
        $user = Admin::where('name', $req->name)->first();
        if(!$user){
            return redirect()->back();
        }
        else{
            $req->validate([
                'name' => 'required|string',
                'password' => 'required|string',
            ]);
            if($user->password === $req->password && $user->role_id === 2){
                Auth::login($user);
                return redirect()->route('home');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
}