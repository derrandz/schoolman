<?php

namespace App\DataLayer\Internals\Repositories;

use Database;
use DB;

class DatabasesInstancesRepository 
{
	public function all()
    {
    	return Database::all();
    }

    public function allNamesQuery()
    {
    	return DB::table('database_instances')->lists('name');
    }

}