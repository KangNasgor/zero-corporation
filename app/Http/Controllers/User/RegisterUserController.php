<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;
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
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); 
            
            Auth::login($user);
            event(new Registered($user));
            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('register.error', 'Error while registering, try again.');
        }
        return redirect()->route('verification.notice');
    }
}
