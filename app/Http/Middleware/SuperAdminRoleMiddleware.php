<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login')->withErrors('You must be logged in to access this page.');
        }
        if($user->role_id == $role){
            return $next($request); 
        }
        return redirect()->route('home')->with('role-failed', 'You do not have permission to access this page.');
    }
}
