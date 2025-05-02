<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check() && in_array(Auth::user()->role->name, $roles)) {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder a esta sección.');
    }
}
