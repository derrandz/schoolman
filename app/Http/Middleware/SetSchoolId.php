<?php

namespace App\Http\Middleware;

use Closure;

class SetSchoolId
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
        $request->school_id = CurrentUserSchoolId();
        return $next($request);
    }
}
