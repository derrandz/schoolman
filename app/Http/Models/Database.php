<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
use DB;

class Database extends Model
{

	protected $table = 'database_instances';

	protected $fillable = ['name', 'organism_id'];

	protected $connection;

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
		$mysql_query = 'CREATE DATABASE '.$this->name;
		DB::statement($mysql_query);
	}

	public function create_connection($options = null)
	{
		configureConnectionByName($options); //Helper

	}

	public function connect($options = null)
	{
		$database = $this->name;
		// Figure out the driver and get the default configuration for the driver
		$driver  = isset($options['driver']) ? $options['driver'] : Config::get("database.default");
		$default = Config::get("database.connections.$driver");

		// Loop through our default array and update options if we have non-defaults
		foreach($default as $item => $value)
		{
			$default[$item] = isset($options[$item]) ? $options[$item] : $default[$item];
		}

		// Set the temporary configuration
		Config::set("database.connections.$database", $default);

		// Create the connection
		$this->connection = DB::connection($database);

		echo 'connection to database '.$database.' has been established';
	}

	public function establish_connection($options = null)
	{
		$this->connect($options);
	}

	/**
	 * Get the on the fly connection.
	 *
	 * @return \Illuminate\Database\Connection
	 */
	public function connection()
	{
		return $this->connection;
	}

	/**
	 * Get a table from the on the fly connection.
	 *
	 * @var    string $table
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function table($table = null)
	{
		return $this->getConnection()->table($table);
	}

}
