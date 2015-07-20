<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use SchoolMotor;
use UserMotor;

class DashboardController extends Controller
{
    public function __construct(SchoolMotor $schools, UserMotor $users)
    {	
		 $this->motors = array(
		 				"schools" => $schools, 
						"users"   => $users,
						);
    }

    /*
    |
	| Motors that implement the CRUDtrait have all crud actions with views ready, so you can call them 
	| out of box.
	|
	| Also, Motors have access to the data layer, and can provide you with the data you need from the database,
	| for instance, you will want to create your own index with multiple 'models', simly use :
	|
	|	$this->motors['motorname']->model->all()
	|
	|
	| Each motor's model have a basic crud set of functions to handle your crud needs
	| including : 
	|			all()
	|			create()
	|			find()
	|			update()
	|			destroy()
	|
	| For more info, dwelve into the datalayer directory after having gone through the source code of 
	| motors a bit, hopefully you can get a sight of this.
	|
	*/

    public function getIndex()
    {
    	$schools = $this->motors['schools']->getRepo()->all();
    	$schools = $this->motors['users']->getRepo()->all();

    	return view('dashboard.index', ['schools' => $schools, 'schools' => $schools]);
    }

    public function getSchoolsIndex()
    {
        return $this->motors['schools']->index();
    }

    public function getUsersIndex()
    {
    	return $this->motors['users']->index();
    }

    public function getDatabasesIndex()
    {
    	// return $this->motors['databases']->index();
    }
}
