<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use View;
use Session;

class RedirectIfNotAuthenticated
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $this->auth->check() )
        {
            if( Auth::user()->is_admin() )
            {
                return \Redirect::route('organisms.index');
            }
            else
            {
                return View::make('welcome');
            }
        }
        else
        {
            Session::flash('flash_message', 'You have to be logged in first.');
            Session::flash('flash_type', 'alert-warning');
            return \Redirect::route('auth.login');
        }
    }
}
