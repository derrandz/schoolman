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

        $authUserRole = current_user_role();

        if( $authUserRole == 'SUPERADMIN' )
        {
            $school_id = $request->school_id;
            $database_name = '';

            if($school_id != -1)
            {
                $school        = SchoolsRepoHelperFind($school_id, new SchoolsRepoInterface);                
                $database_name =  $school->database->name;
            }
            else
            {
                $database_name = 'database_of_school_1'; //Only for testing
                //You'll have to change this so some automatic way of setting the proper database;
            }
            $database_connection = set_database(['database' => $database_name]);
        }
        else
        {
            $database_name = current_user_database();            

            $database_connection = set_database(['database' => $database_name]);
        }

        return $next($request);
    }
}
