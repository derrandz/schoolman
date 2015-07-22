<?php

namespace App\DataLayer\Tenants\Objects;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function exams()
    {
    	return $this->belongsTo('Exams');
    }
}
