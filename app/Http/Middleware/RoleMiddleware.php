<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login'); // jika belum login
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized'); // kalau role tidak sesuai
        }

        return $next($request);
    }
}
