<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('loginView')->withErrors('You must be logged in to access this page.');
        }
        if (in_array($user->role_id, $roles)) {
            return $next($request);
        }
        Auth::logout();
        return redirect()->route('loginView')->withErrors('You do not have permission to access this page.');
    }
}