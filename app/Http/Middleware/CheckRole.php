<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Si l'utilisateur n'est pas connecté OU si son rôle ne correspond pas au rôle requis...
        if (! $request->user() || $request->user()->role !== $role) {
            // ... on lui renvoie une erreur "Accès Interdit".
            abort(403);
        }

        // Sinon, on le laisse continuer sa route.
        return $next($request);
    }
}
