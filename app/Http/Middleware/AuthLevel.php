<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array(auth()->user()->user_role->role->name, $levels)) {
            return $next($request);
        }

        abort(403);
    }
}
