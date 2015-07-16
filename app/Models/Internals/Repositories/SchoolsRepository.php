<?php

namespace App\Models\Internals\Repositories;

use Illuminate\Database\Eloquent\Model;

use SchoolsInterface;
use School;

class SchoolsRepository implements SchoolsInterface
{
    public function all()
    {
    	return School::all();
    }

    public function new_school($params = array())
    {
        $school       = new School;
        $school->name = $params['name'];
        $school->code = $params['code'];

        return $school;
    }

    public function create($params = array())
    {
        return School::create($params);
    }

    public function find($id)
    {
    	return School::find($id);
    }

    public function update($id, $params)
    {
        $school = School::find($id);
        $school->name = $params['name'];
        $school->code = $params['code'];

        return $school->save();
    }

    public function destroy($id)
    {
        $school = School::find($id);
        return $school->delete();
    }
}
