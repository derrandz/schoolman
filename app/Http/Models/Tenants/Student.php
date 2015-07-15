<?php

namespace App\Http\Models\Tenants;

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
    	return $this->hasMany('Class');
    }

    public function teachers()
    {
    	return $this->hasManyThrough('Teacher', 'Class');
    }
}
