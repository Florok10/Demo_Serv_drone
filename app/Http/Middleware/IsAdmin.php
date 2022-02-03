<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verify if the user logged in is admin
        if ((int)auth()->user()->admin == 1 || (int)auth()->user()->admin == 2) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
