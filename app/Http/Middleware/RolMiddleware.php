<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;        
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if (!$user || !in_array($user->rol->nombre ?? '', $roles)) {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}