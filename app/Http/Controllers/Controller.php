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

    protected $motors = array();
    
    public function is_logged()
    {
    	if( !(Auth::check()) )
		{
    		flash('warning', 'You have to be logged in first');
    		return Redirect::to('auth/login');
    	}
    }
}
