<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ThemeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()){
            return abort(401, 'This action is unauthorized.');
        }

        else if ($request->user()->authorizeRoles('Theme Admin'))
        {
            return $next($request);
        }
    }
}
