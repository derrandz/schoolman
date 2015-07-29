<?php

namespace App\Http\Middleware;

use Closure;
use DatabaseConnection;
use SchoolsRepoInterface;

class SetProperDatabase
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

        $authUserRole = CurrentUserRole();

        if( $authUserRole == 'SUPERADMIN' )
        {
            $school_id     = $request->school_id;
            $database_name = '';

            if($school_id != -1)
            {
                $database = getDatabasNameOfSchool($school_id);
                $database_name =  $database;

            }
            else
            {
                $database_name = getDatabasNameOfSchool($school_id);

            }

            $database_connection = connectToDatabase(['database' => $database_name]);
        }
        else
        {
            $database_name = getCurrentUserDatabaseName();            

            $database_connection = connectToDatabase(['database' => $database_name]);
        }

        return $next($request);
    }
}
