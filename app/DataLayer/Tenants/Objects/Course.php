<?php

namespace App\DataLayer\Tenants\Objects\Tenants;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function classes()
    {
    	return $this->belongsTo('Course');
    }

    public function exams()
    {
    	return $this->hasMany('Exam');
    }

}
