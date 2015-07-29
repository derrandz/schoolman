<?php

namespace App\Http\Middleware;

use Closure;
use Lang;

class RedirectIfAuthenticated
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
        if( is_logged() )
        {
            flash('notice', Lang::has('auth.already-logged') ? Lang::get('auth.already-logged') : 'You are already logged (SET I8N)');
            return RedirectToRoute('admin.index');
        }
        return $next($request);
    }
}
