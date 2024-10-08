<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( !isset($request->age) ) {
            return response()->json(['message' => 'age param is required']);
        }

        if ( $request->age <= 18){
            return response()->json(['message' => 'You are too young']);
        }

        return $next($request);
    }
}
