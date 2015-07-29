<?php

namespace App\DataLayer\Tenants\Objects;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
 
	protected $table = "students";

    protected $fillable = ['name', 'age', 'grade', 'file_id'];

    public function file()
    {
        return $this->belongsTo('File');
    }

    public function classes()
    {
    	return $this->hasMany('Seminar');
    }

    public function teachers()
    {
    	return $this->hasManyThrough('Teacher', 'Seminar');
    }
}
