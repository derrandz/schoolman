<?php

namespace App\Http\Models\Tenants;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

	public function classes()
	{
		return $this->hasMany('Class');
	}
	
    public function students()
    {
    	return $this->hasManyThrough('Student', 'Class');
    }
}
