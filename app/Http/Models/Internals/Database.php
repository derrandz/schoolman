<?php

namespace App\Http\Models\Internals;

use Illuminate\Database\Eloquent\Model;
use Config;
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
		$mysql_query = 'CREATE DATABASE '.$this->name;
		DB::statement($mysql_query);
	}
	
	public function connect($options = null)
	{
		$connection = new DatabaseConnection(['database' => $this->name,]);

		return $connection;
	}

	public function establish_connection($options = null)
	{
		return $this->connect($options);
	}


	public function connection()
	{
		return $this->connect();
	}


	public function table($table = null)
	{
		return $this->connection()->getTable($table);
	}

}
