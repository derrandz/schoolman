<?php

namespace App\Http\Middleware;

use Closure;

class CheckForRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $access_granted;

    public function __construct()
    {
        $this->access_granted = $this->check();
    }

    protected function check()
    {
        $controller = getControllerName();

        switch ( current_user_role() ) 
        {
            case "SUPERADMIN":
                return true;
            break;

            case "ADMIN":

                if($getControllerName == 'SchoolsManagerController')
                {
                    return true;
                }

                return false;

            break;

            case "ASSISTANT":

                if($getControllerName == 'SchoolsManagerController')
                {
                    return true;
                }
                
                return false;

            break;

            case "TEACHER":

                if($getControllerName == 'StudentsManagerController')
                {
                    return true;
                }
                
                return false;

            break;        

            case "PARENT":

                if($getControllerName == 'ConsultationsController')
                {
                    return true;
                }
                
                return false;

            break;

            default: dd('There was no registered role!'); break;
        }
    }


    public function handle($request, Closure $next)
    {
        if( !($this->access_granted) )
        {
            flash_lang('danger', 'auth.access-permission-denied', 'set lang message');
        }

        flash_lang('success', 'auth.access-permission-granted', 'set lang message');

        return $next($request);
    }
}
