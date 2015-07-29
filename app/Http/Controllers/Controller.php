<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Redirect;
use Input;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $motors = array();
    
    protected function is_logged()
    {
    	if( !(Auth::check()) )
		{
    		flash('warning', 'You have to be logged in first');
    		return Redirect::to('auth/login');
    	}
    }

    protected function setDatabaseId()
    {
        /*
        |
                Gets the selected school id from select input
        |
                Sets is to the admin's request school id 
        |

        |
        */

        $school_id = Input::get('school_id');

        setRequestSchoolId($school_id);
        
        return RedirectToRoute('admin.schoolmanager');
    }
}
