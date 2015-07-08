<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Session;
use Redirect;
use DatabaseConnection;
use OrganismSetup;
use Response;
use Teacher;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function is_logged()
    {
    	if( !(Auth::check()) )
		{
    		Session::flash('flash_message', 'You have to be logged in');
    		Session::flash('flash_type', 'alert-warning');
    		return Redirect::to('auth/login');
    	}
    }

    public function set_database($database_name)
    {
        $database_connection = new DatabaseConnection(['database' => $database_name]);
    }
}
