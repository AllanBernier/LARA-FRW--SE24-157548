<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssertUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ( !isset($request->user_id)) {
            return response()->json(['message' => 'request must contain user_id']);
        }

        $user = User::find($request->user_id);

        if (!$user){
            return response()->json(['message' => 'user not found']);
        }

        $request['user'] = $user;

        return $next($request);
    }
}
