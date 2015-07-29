<?php

namespace App\DataLayer\Tenants\Objects;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = 'seminars';

    public function teachers()
    {
    	return $this->belongsTo('Teacher');
    }

    public function students()
    {
    	return $this->belongsTo('Student');
    }

    public function courses()
    {
    	return $this->hasMany('Course');
    }

    public function exams()
    {
        return $this->hasManyThrough('Exam', 'Course');
    }
}
