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
            
            $school = SchoolsRepoHelperFind($school_id, new SchoolsRepoInterface);

            $database_connection = new DatabaseConnection(['database' => $school->database->name]);
        }
        else
        {
            $database_name = current_user_database();

            $database_connection = new DatabaseConnection(['database' => $database_name]);
        }

        return $next($request);
    }
}
