<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->id_rol === 1) {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder a esta sección.');
    }
}
