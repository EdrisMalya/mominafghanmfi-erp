<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->user()->profile){
            return response()->json([
                'message' => 'User profile is not setup yet. Please contact administrator.',
                'result' => false,
            ]);

        }
        return $next($request);
    }
}
