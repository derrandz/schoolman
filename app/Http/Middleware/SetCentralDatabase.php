<?php

namespace App\Http\Middleware;

use Closure;

class SetCentralDatabase
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
        set_database(['database' => 'central_database']);
        return $next($request);
    }
}
