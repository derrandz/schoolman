<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Database extends Model
{

	protected $table = 'database_instances';

	protected $fillable = ['name', 'organism_id'];

	/**
	* Eloquent Relationshis.
	*
	*/
    public function organism()
    {
    	return $this->belongsTo('Organism');
    }

	/**
	*
	* Methodes
	*
	*/

	public function establish_database()
	{
		//Create the Database;
		echo($this->name);
		DB::statement("CREATE DATABASE ?",[$this->name]);
	}

	public function establish_connection($options = null)
	{
		//Flag to detect dictate whether the database exists
		static $database_exists = true;

		//Check whether the database already exists or not
		foreach(Database::all() as $existing_db)
		{
			if( $existing_db->name == $this->name )
			{
				$database_exists = false;
			}
		}

		if( !($database_exists) )
		{//If the datbase does not exist
			$this->establish_database();
		}

		// Figure out the driver and get the default configuration for the driver
		$driver  = isset($options['driver']) ? $options['driver'] : Config::get("database.default");
		$default = Config::get("database.connections.$driver");

		// Loop through our default array and update options if we have non-defaults
		foreach($default as $item => $value)
		{
			$default[$item] = isset($options[$item]) ? $options[$item] : $default[$item];
		}

		// Set the temporary configuration
		Config::set("database.connections.$this->name", $default);

		// Create the connection
		$this->connection = DB::connection($this->name);
	}

}
