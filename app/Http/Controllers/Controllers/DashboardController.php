<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use SchoolMotor;
use UserMotor;

    /*
    |
    | Motors that implement the CRUDtrait have all crud actions with views ready, so you can call them 
    | out of box.
    |
    | Also, Motors have access to the data layer, and can provide you with the data you need from the database,
    | for instance, you will want to create your own index with multiple 'models', simly use :
    |
    |   $this->motors['motorname']->model->all()
    |
    |
    | Each motor's model have a basic crud set of functions to handle your crud needs
    | including : 
    |           all()
    |           create()
    |           find()
    |           update()
    |           destroy()
    |
    | For more info, dwelve into the datalayer directory after having gone through the source code of 
    | motors a bit, hopefully you can get a sight of this.
    |
    */
    
class DashboardController extends Controller
{
    public function __construct(SchoolMotor $schools, UserMotor $users)
    {	
        $this->middleware('isauth');
        $this->middleware('role');
        $this->middleware('set_central_database');
        $this->motors = array(
		 				"schools" => $schools, 
						"users"   => $users,
						);
    }

    public function getIndex()
    {
    	$schools = $this->motors['schools']->getRepo()->all();
    	$schools = $this->motors['users']->getRepo()->all();

    	return view('dashboard.index', ['schools' => $schools, 'schools' => $schools]);
    }

    /*
    |
    | Schools
    |
    */

    public function getSchoolsIndex()
    {
        return $this->motors['schools']->index();
    }

    public function getSchoolsShow($id)
    {
    	return $this->motors['schools']->show($id);
    }

    public function getSchoolsCreate()
    {
    	return $this->motors['schools']->create();
    }

    public function postSchoolsStore()
    {
    	return $this->motors['schools']->store();
    }

    public function getSchoolsEdit($id)
    {
    	return $this->motors['schools']->edit($id);
    }

    public function putSchoolsUpdate($id)
    {
    	return $this->motors['schools']->update($id);
    }
    
    public function getSchoolsDelete($id)
    {
    	return $this->motors['schools']->delete($id);
    }

    public function deleteSchoolsDestroy($id)
    {
    	return $this->motors['schools']->destroy($id);
    }

    /*
    |
    | Users
    |
    */

	public function getUsersIndex()
    {
        return $this->motors['users']->index();
    }

    public function getUsersShow($id)
    {
    	return $this->motors['users']->show($id);
    }

    public function getUsersCreate()
    {
    	return $this->motors['users']->createWithRoles();
    }

    public function postUsersStore(Request $request)
    {
    	return $this->motors['users']->storeWithRoles($request);
    }

    public function getUsersEdit($id)
    {
    	return $this->motors['users']->edit($id);
    }

    public function putUsersUpdate($id)
    {
    	return $this->motors['users']->update($id);
    }
    
    public function getUsersDelete($id)
    {
    	return $this->motors['users']->delete($id);
    }

    public function deleteUsersDestroy($id)
    {
    	return $this->motors['users']->destroy($id);
    }

}
