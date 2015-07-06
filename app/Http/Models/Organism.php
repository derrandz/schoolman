<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Artisan;

class Organism extends Model
{
    protected $fillable = ['name', 'code'];

    public function database()
    {
    	return $this->hasOne('Database');
    }

    public function create_database($attributes = array())
    {
    	$database = new Database($attributes);
		$this->database()->save($database);
		$this->database->establish_database();
    }

    public function connect_to_database()
    {
    	$database = $this->database;
		$database->establish_connection([ 
			'driver'   => 'mysql',
		    'database' => $database->name,
            // 'username' => 'fpuser1',
            // 'password' => 'mypassword',
		    ]);
    } 

    public function run_migrations()
    {
        $migrate_install = Artisan::call('migrate:install', [
            '--database' => $this->database->name,
            ]);
        $migrations = Artisan::call('migrate', [
                            '--database' => $this->database->name,
                            '--path'     => 'database/migrations/tenants'
                        ]);
        return [$migrate_install, $migrations];
    }

}
