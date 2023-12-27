<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check() && !is_numeric(array_search($request->path(),['login', 'user']))) {
            throw new AuthenticationException();
        } else if (Auth::check() && is_numeric(array_search($request->path(),['login', 'user']))) {
            return to_route('series.index');
        }
        
        return $next($request);
    }
}
