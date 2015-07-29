<?php

namespace App\DataLayer\Tenants\Repositories;

use CRUDInterface;
use Result;

class ResultsRepository implements CRUDInterface
{
	
    public $attributes = ['score', 'rating', 'exam_id'];

	public function all()
    {
    	return Result::all();
    }

    public function create(array $params)
    {
        return Result::create($params);
    }

    public function find($id)
    {
    	return Result::find($id);
    }

    public function update($id, $params)
    {
        $result = Result::find($id);

	    return $result->updateAttributes($params);
    }

    public function destroy($id)
    {
        $result = Result::find($id);
        return $result->delete();
    }

}