<?php

namespace App\Http\Middleware;

use Closure;
use DatabaseConnection;

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
        $database_name = '';
        $controllerAndActionName = getControllerAndActionName();
        $controller_name = $controllerAndActionName['controller'];
        $action_name = $controllerAndActionName['action'];

        dd($request);
        if($controller_name === 'OrganismsController')
        {
            if($action_name == 'show')
            {
                $database_name = 'database_of_org_name';
            }
            else
            {
                $database_name = 'files_platform_db';
            }
        }
        else
        {
            $database_name = 'files_platform_db';
        }

        $database_connection = new DatabaseConnection(['database' => $database_name]);

        return $next($request);
    }
}
