<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Motor;

use FileMotor;
use TeacherMotor;
use StudentMotor;
use SeminarMotor;
use ExamMotor;
use CourseMotor;
use ResultMotor;

class SchoolsManagerController extends Controller
{
    public function __construct(FileMotor    $files,
                                TeacherMotor $teachers,  
                                StudentMotor $students,
                                SeminarMotor $seminars, 
                                ExamMotor    $exams, 
                                CourseMotor  $courses, 
                                ResultMotor  $results)
    {
        $this->middleware('isauth');
        $this->middleware('set_proper_database');
        
    	$this->motors = array(
                        "files"    => $files, 
		 				"teachers" => $teachers,
                        "students" => $students,
                        "seminars"  => $seminars,
                        "exams"    => $exams,
                        "courses"  => $courses,
                        "results"  => $results,
						);
    }

/*
|
|
| Teachers Actions
|
|
*/

    public function getDashboard()
    {
        $alls = $this->getMotorsModelsAll();
        return $this->getDashboardView($alls);
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

    public function getCreateTeachersFromFiles()
    {
        return $this->getFilesCreate();
    }

    public function postStoreTeachersFromFiles()
    {
        return $this->motors['files']->createTeachers();
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


    /*
    |

    |
    
    | Students Actions
    
    |
    
    |
    */

    public function getStudentsIndex()
    {
        return $this->motors['students']->index();
    }

    public function getStudentsShow($id)
    {
        return $this->motors['students']->show($id);
    }

    public function getStudentsCreate()
    {
        return $this->motors['students']->create();
    }

    public function postStudentsStore()
    {
        return $this->motors['students']->store();
    }

    public function getCreateStudentsFromFiles()
    {
        return $this->getFilesCreate();
    }

    public function postStoreStudentsFromFiles()
    {
        return $this->motors['files']->createStudents();
    }

    public function getStudentsEdit($id)
    {
        return $this->motors['students']->edit($id);
    }

    public function putStudentsUpdate($id)
    {
        return $this->motors['students']->update($id);
    }
    
    public function getStudentsDelete($id)
    {
        return $this->motors['students']->delete($id);
    }

    public function deleteStudentsDestroy($id)
    {
        return $this->motors['students']->destroy($id);
    }


    /*
    |

    |
    
    | Classes Actions
    
    |
    
    |
    */

    public function getSeminarsIndex()
    {
        return $this->motors['seminars']->index();
    }

    public function getSeminarsShow($id)
    {
        return $this->motors['seminars']->show($id);
    }

    public function getSeminarsCreate()
    {
        return $this->motors['seminars']->create();
    }

    public function getCreateSeminarsFromFiles()
    {
        return $this->getFilesCreate();
    }

    public function postStoreSeminarsFromFiles()
    {
        return $this->motors['files']->createClasses();
    }

    public function postSeminarsStore()
    {
        return $this->motors['seminars']->store();
    }

    public function getSeminarsEdit($id)
    {
        return $this->motors['seminars']->edit($id);
    }

    public function putSeminarsUpdate($id)
    {
        return $this->motors['seminars']->update($id);
    }
    
    public function getSeminarsDelete($id)
    {
        return $this->motors['seminars']->delete($id);
    }

    public function deleteSeminarsDestroy($id)
    {
        return $this->motors['seminars']->destroy($id);
    }

    /*
    |

    |
            Private functions
    |

    |
    */

    private function getMotorsModelsAll()
    {
        $files    = $this->motors['files']->getRepo()->all();
        $teachers = $this->motors['teachers']->getRepo()->all();
        $students = $this->motors['students']->getRepo()->all();
        $seminars  = $this->motors['seminars']->getRepo()->all();
        $exams    = $this->motors['exams']->getRepo()->all();
        $courses  = $this->motors['courses']->getRepo()->all();
        $results  = $this->motors['results']->getRepo()->all();

        return [

                'files' => $files, 
                'teachers' => $teachers, 
                'students' => $students, 
                'seminars' => $seminars, 
                'exams' => $exams, 
                'courses' => $courses, 
                'results' => $results
                
                ];
    }

    private function getDashboardView(array $repos)
    {
        return $this->motors['teachers']->getSchoolsManagerDashboard($repos);
    }
}
