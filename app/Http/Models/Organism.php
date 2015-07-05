<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Organism extends Model
{
    protected $connection = 'mysql';

    protected $fillable = ['name', 'code'];
}
