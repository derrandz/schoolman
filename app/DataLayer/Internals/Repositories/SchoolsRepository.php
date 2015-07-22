<?php

namespace App\DataLayer\Internals\Repositories;

use CRUDInterface;
use SchoolsFactory;
use School;

class SchoolsRepository implements CRUDInterface
{
    public $attributes = ['name', 'code'];
    
    public function all()
    {
    	return School::all();
    }

    public function create(array $params)
    {
        return SchoolsFactory::create($params);
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

        $school->update_database($params['name']);

        return $school->save();
    }

    public function destroy($id)
    {
        $school = School::find($id);
        return $school->delete();
    }
}
