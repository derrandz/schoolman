<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use TeacherMotor;

class SchoolsManagerController extends Controller
{
    public function __construct(TeacherMotor $teachers)
    {
        $this->middleware('isauth');
        $this->middleware('set_proper_database');
        
    	$this->motors = array(
		 				"teachers" => $teachers, 
						);
    }

    public function getTeachersIndex()
    {
        return $this->motors['teachers']->index();
    }

    public function getTeachersShow($id)
    {
    	return $this->motors['teachers']->show($id);
    }

    public function getTeachersCreate()
    {
    	return $this->motors['teachers']->create();
    }

    public function postTeachersStore()
    {
    	return $this->motors['teachers']->store();
    }

    public function getTeachersEdit($id)
    {
    	return $this->motors['teachers']->edit($id);
    }

    public function putTeachersUpdate($id)
    {
    	return $this->motors['teachers']->update($id);
    }
    
    public function getTeachersDelete($id)
    {
    	return $this->motors['teachers']->delete($id);
    }

    public function deleteTeachersDestroy($id)
    {
    	return $this->motors['teachers']->destroy($id);
    }

}
