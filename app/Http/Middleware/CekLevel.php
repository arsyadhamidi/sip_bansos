<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {

        info(json_encode($levels));

        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Maaf ! Anda tidak memiliki hak akses.');

    }
}
