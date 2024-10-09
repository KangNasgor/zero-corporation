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
            if(Auth::attempt(['name' => $req->name, 'password' => $req->password, 'role_id' => 2])){
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
/**
 * ALUR KERJA LOGIN
 * 
 * From LoginController, using Auth::attempt() it tries to retrieve user's data from Admin table in the database, Admin Model is referred in config/auth.php
 * if the data matches, the middleware will check the role is it admin or not,
 * if not it will fail and user will be redirected to login page, if succeed the app will continue to work as expected.
 */