<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

 

class EnsureTokenIsValid
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response //if token !== specified value then redirect in '/' 
    {
        if ($request->input('token') !== 'my-secret-token') {
            return redirect('/')->with('error', 'you don\'t have token');
        }
        return $next($request);
    }
}