<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        if ($request->query('rol') !== $rol) {
            abort(403, 'Acceso denegado: no tienes el rol requerido.');
        }

        return $next($request);
    }
}