<?php

namespace App\DataLayer\Tenants\Objects;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

	protected $table = 'courses';

    public function classes()
    {
    	return $this->belongsTo('Seminar');
    }

    public function exams()
    {
    	return $this->hasMany('Exam');
    }

}
