<?php

namespace App\Http\Middleware;

use Closure;
use SchoolsRepoInterface;

class SetCentralDatabase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected function ActionIsSetDatabase()
    {
        $actionName = getActionName();

        if( $actionName != 'setDatabase' )
        {
            return false;
        }

        return true;
    }

    public function handle($request, Closure $next)
    {
        if(!$this->ActionIsSetDatabase())
        {
            connectToDatabase(['database' => 'central_database']);
        }
        else
        {
            if( !is_null( $database = getDatabasNameOfSchool( $request->all()['school_id'] ) ) ) 
            {
                $database_name = $database;
                connectToDatabase(['database' => $database_name]);
            }
            else
            {
                connectToDatabase(['database' => 'central_database']);
                flash('danger', 'could not set the database');
                RedirectToRoute('admin.dashboard');
            }

        }

        return $next($request);
    }
}
