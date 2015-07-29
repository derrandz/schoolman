<?php

namespace App\DataLayer\Tenants\Repositories;

use Exam;
use CRUDInterface;

class ExamsRepository implements CRUDInterface
{
	public $attributes = ['title', 'duration', 'date', 'description', 'course_id'];

	public function all()
    {
    	return Exam::all();
    }

    public function create(array $params)
    {
        return Exam::create($params);
    }

    public function find($id)
    {
    	return Exam::find($id);
    }

    public function update($id, $params)
    {
        $exam = Exam::find($id);

	    return $exam->updateAttributes($params);
    }

    public function destroy($id)
    {
        $exam = Exam::find($id);
        return $exam->delete();
    }

}