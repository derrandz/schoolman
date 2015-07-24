<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use TeacherMotor;
use FileMotor;

class SchoolsManagerController extends Controller
{
    public function __construct(TeacherMotor $teachers, FileMotor $files)
    {
        $this->middleware('isauth');
        $this->middleware('set_proper_database');
        
    	$this->motors = array(
		 				"teachers" => $teachers,
                        "files"    => $files, 
						);
    }

/*
|
|
| Teachers Actions
|
|
*/
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

/*
|
|
| Files Actions
|
|
*/
    public function getFilesIndex()
    {
        return $this->motors['files']->index();
    }

    public function getFilesShow($id)
    {
        return $this->motors['files']->show($id);
    }

    public function getFilesCreate()
    {
        return $this->motors['files']->create();
    }

    public function postFilesStore()
    {
        return $this->motors['files']->store();
    }

    public function getFilesEdit($id)
    {
        return $this->motors['files']->edit($id);
    }

    public function putFilesUpdate($id)
    {
        return $this->motors['files']->update($id);
    }
    
    public function getFilesDelete($id)
    {
        return $this->motors['files']->delete($id);
    }

    public function deleteFilesDestroy($id)
    {
        return $this->motors['files']->destroy($id);
    }


}
