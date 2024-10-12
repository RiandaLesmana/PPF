<?php
// app/Http/Middleware/Admin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!Auth::check() || ($user && !in_array($user->roles, ['admin', 'member']))) {
            return redirect()->route('items.index'); // Redirect if not admin or member
        }

        return $next($request);
    }
}