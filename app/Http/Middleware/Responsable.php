<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Responsable
{
    public function handle($request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->id_rol === 1 || Auth::user()->id_rol === 2) {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder a esta sección.');
    }
}
