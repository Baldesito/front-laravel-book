<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica che l'utente sia autenticato e sia un admin
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            // Se non è admin, reindirizza alla home con un messaggio di errore
            return redirect('/')->with('error', 'Accesso negato. Solo gli amministratori possono accedere a questa sezione.');
        }

        return $next($request);
    }
}
