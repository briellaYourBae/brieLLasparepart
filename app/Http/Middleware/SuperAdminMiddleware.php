<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'superadmin') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Akses ditolak. Hanya Super Admin yang diizinkan.');
    }
}
