<?php

namespace App\DataLayer\Tenants\Repositories;

use Teacher;
use CRUDInterface;

class TeachersRepository implements CRUDInterface
{

    public $attributes = ['first_name', 'last_name', 'serialcode', 'birthdate', 'hiredate'];

	public function all()
    {
    	return Teacher::all();
    }

    public function create(array $params)
    {
        return Teacher::create($params);
    }

    public function find($id)
    {
    	return Teacher::find($id);
    }

    public function update($id, $params)
    {
        $teacher = Teacher::find($id);

	    return $teacher->updateAttributes($params);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        return $teacher->delete();
    }

}