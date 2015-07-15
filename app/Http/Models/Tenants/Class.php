<?php

namespace App\Http\Models\Tenants;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
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
