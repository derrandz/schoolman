<?php

namespace App\Http\Models\Tenants;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function exams()
    {
    	return $this->belongsTo('Exams');
    }
}
