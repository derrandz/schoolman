<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
 
	protected $table = "students";

    protected $fillable = ['name', 'age', 'grade'];

    public function file()
    {
        return $this->belongsTo('File');
    }
}
