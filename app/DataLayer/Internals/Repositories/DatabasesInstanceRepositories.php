<?php

namespace App\DataLayer\Internals\Repositories;

use Database;

class DatabasesInstancesRepository 
{
	 public function all()
    {
    	return Database::all();
    }
}