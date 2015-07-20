<?php

namespace App\DataLayer\Tenants\Objects\Tenants;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function exams()
    {
    	return $this->belongsTo('Exams');
    }
}
