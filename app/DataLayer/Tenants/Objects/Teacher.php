<?php

namespace App\DataLayer\Tenants\Objects;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = ['first_name', 'last_name', 'serialcode', 'birthdate', 'hiredate'];

	public function seminars()
	{
		return $this->hasMany('Seminar');
	}
	
    public function students()
    {
    	return $this->hasManyThrough('Student', 'Seminar');
    }

    public function updateAttributes(array $attributes)
    {
    	$this->fisrt_name = $attributes['first_name'];
    	$this->last_name = $attributes['last_name'];
    	$this->serialcode = $attributes['serialcode'];
    	$this->birthdate = $attributes['birthdate'];
    	$this->hiredate = $attributes['hiredate'];

    	return $this->save();
    }
}
