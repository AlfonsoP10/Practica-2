<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoloCelular
{
    public function handle(Request $request, Closure $next): Response
    {
        $userAgent = strtolower($request->header('User-Agent'));

        $moviles = [
            'android',
            'iphone',
            'ipad',
            'ipod',
            'mobile',
            'windows phone'
        ];

        foreach ($moviles as $movil) {
            if (str_contains($userAgent, $movil)) {
                return redirect('/movil');
            }
        }

        return $next($request);
    }
}