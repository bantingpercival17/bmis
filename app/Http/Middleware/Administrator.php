<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $_status = false;
        foreach (Auth::user()->roles as $key => $role) {
            if ($role->id == 1) {
                $_status = true;
            }
        }
        return $_status ? $next($request) : redirect('/');
    }
}
