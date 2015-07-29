<?php

namespace App\DataLayer\Tenants\Repositories;

use CRUDInterface;
use Course;

class CoursesRepository implements CRUDInterface
{
	public $attributes = ['name', 'class_id', 'description'];

	public function all()
    {
    	return Course::all();
    }

    public function create(array $params)
    {
        return Course::create($params);
    }

    public function find($id)
    {
    	return Course::find($id);
    }

    public function update($id, $params)
    {
        $course = Course::find($id);

	    return $course->updateAttributes($params);
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        return $course->delete();
    }
}