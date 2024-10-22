<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class ProfileUserController extends Controller{
    public function profile(): View{
        return view('user.profile.profile');
    }
    public function edit(Request $req, int $id){
        $req->validate([
            'name' => ['bail', 'max:255', 'required'],
            'email' => ['required', 'email:rfc,dns'],
        ]);
        $user = User::where('id', $id)->first();
        if($user->email == $req->input('email')){
            $user->update([
                'name' => $req->input('name'),
                'email' => $req->input('email'),
            ]);
        }
        else{
            $user->update([
                'name' => $req->input('name'),
                'email' => $req->input('email'),
            ]);
            event(new Registered($user));
        }
        return redirect()->route('profile.user');
    }
}