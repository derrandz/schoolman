<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Organism extends Model
{
    protected $connection = 'mysql';

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
		    'database' => $database->database,
		    ]);
    } 

   	public function run_migrations()
   	{
		return Artisan::call('migrate', [
			'--database' => $this->database->database,
			'--path'     => 'database/migrations/tenants'
		]);
   	}
}
