<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
use DB;
use Dispatcher;
use Container;
use Capsule;

class DatabaseConnection extends Model
{
	/**
	* This class serves as a connection server.
	* It serves a connection to a different database on runtime
	* It is to establish connections using Capsule, and Database methodes.
	* Also it boots eloquent as to make the normal usage of it possible in the new database.
	*
	*/

	/**
	*
	* Keeps track of all of the created instances of this class
	* @var DatabaseConnection array
	*
	*/

	static $instances=array();
	/**
	 * The name of the database we're connecting to on the fly.
	 *
	 * Keyword static is used for the obvious reason, to preserve the instances for as long as the application is running.
	 *
	 * @var string $database
	 */
	protected $database;

	/**
	 * The on the fly database connection.
	 *
	 * @var \Illuminate\Database\Connection
	 */
	protected $connection;

	/**
	 * Create a new on the fly database connection.
	 *
	 * @param  array $options
	 * @return void
	 */
	public function __construct($options = null)
	{
		// Set the database
		$database = $options['database'];
		$this->database = $database;

		// Figure out the driver and get the default configuration for the driver
		$driver  = isset($options['driver']) ? $options['driver'] : Config::get("database.default");
		$default = Config::get("database.connections.$driver");

		// Loop through our default array and update options if we have non-defaults
		foreach($default as $item => $value)
		{
			$default[$item] = isset($options[$item]) ? $options[$item] : $default[$item];
		}

		$capsule = new Capsule;
		$capsule->addConnection($default);
		$capsule->setEventDispatcher(new Dispatcher(new Container));
		$capsule->setAsGlobal();
		$capsule->bootEloquent();

		// Create the connection
		$this->connection = $capsule->getConnection();

		DatabaseConnection::$instances[] = $capsule;
		return $this->connection;
	}

	/**
	 * Get the on the fly connection.
	 *
	 * @return \Illuminate\Database\Connection
	 */
	public function getConnection()
	{
		return $this->connection;
	}

	/**
	 * Get a table from the on the fly connection.
	 *
	 * @var    string $table
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function getTable($table = null)
	{
		return $this->getConnection()->table($table);
	}
}