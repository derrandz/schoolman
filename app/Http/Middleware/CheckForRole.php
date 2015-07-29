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

        switch ( CurrentUserRole() ) 
        {
            case "SUPERADMIN":
                return true;
            break;

            case "ADMIN":
                if($controller == 'SchoolsManagerController')
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

            default: return false; break;
        }
    }


    public function handle($request, Closure $next)
    {
        if( !is_logged() )
        {
            flash_lang('notice', 'access-denied');
            return RedirectToRoute('auth.login');
        }

        if( !($this->access_granted) )
        {
            flash_lang('danger', 'role.access-denied', null, 'set lang message');
            return RedirectToRoute('schools.teachers.index');
            
        }

        flash_lang('success', 'role.access-granted', ['role' => CurrentUserRole()], 'set Message');
        return $next($request);
    }
}
