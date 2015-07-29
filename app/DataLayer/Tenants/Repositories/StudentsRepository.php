<?php

namespace App\DataLayer\Tenants\Repositories;

use Student;
use CRUDInterface;

class StudentsRepository implements CRUDInterface
{
	
    public $attributes = ['first_name', 'last_name', 'serialcode', 'birthdate'];

	public function all()
    {
    	return Student::all();
    }

    public function create(array $params)
    {
        return Student::create($params);
    }

    public function find($id)
    {
    	return Student::find($id);
    }

    public function update($id, $params)
    {
        $student = Student::find($id);

	    return $student->updateAttributes($params);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        return $student->delete();
    }

}