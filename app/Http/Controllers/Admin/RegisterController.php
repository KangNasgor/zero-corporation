<?php

namespace App\Http\Controllers\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function registerView() : View{
        return view('register');
    }
    public function registerAdmin(Request $req) {
        $validate = $req->validate([
            'name' => ['bail', 'required', 'max:15'],
            'password' => ['bail', 'required', 'max:10']
        ]);
        if($validate){
            Admin::create([
                'name' => $req->input('name'),
                'password' => Hash::make($req->input('password')),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => '2',
            ]);
            return view('login');
        }
        else{
            return view('register');
        }
    }
}
