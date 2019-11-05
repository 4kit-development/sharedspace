<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserIsDeveloper
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
        if($request->user()->isDeveloper())
          return $next($request);

        return $request->ajax() || $request->wantsJson()
                        ? response('Unauthorized.', 401)
                        : redirect()->guest('login');
    }
}
