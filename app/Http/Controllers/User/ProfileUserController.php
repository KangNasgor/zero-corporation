<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller{
    public function profile(): View{
        return view('user.profile.profile');
    }
    public function edit(Request $req, int $id){
        $req->validate([
            'name' => ['bail', 'max:255', 'required'],
            'email' => ['required', 'email:rfc,dns'],
        ]);
        User::where('id', $id)->first()->update([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
        ]);
        return redirect()->route('profile.user');
    }
}