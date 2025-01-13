<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->roles_idroles != $role) {
            return redirect('/home'); // Redirige a una página de inicio o de error
        }

        return $next($request);
    }
}
