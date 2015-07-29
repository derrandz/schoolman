<?php

namespace App\DataLayer\Tenants\Repositories;

use CRUDInterface;
use Seminar;

class SeminarRepository implements CRUDInterface
{
    public $attributes = ['name', 'serialcode', 'student_id', 'teacher_id', 'year', 'grade', 'starts_at'];

	public function all()
    {
    	return Seminar::all();
    }

    public function create(array $params)
    {
        return Seminar::create($params);
    }

    public function find($id)
    {
    	return Seminar::find($id);
    }

    public function update($id, $params)
    {
        $class = Seminar::find($id);

	    return $class->updateAttributes($params);
    }

    public function destroy($id)
    {
        $class = Seminar::find($id);
        return $class->delete();
    }

}