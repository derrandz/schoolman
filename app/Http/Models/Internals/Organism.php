<?php

namespace App\Http\Models\Internals;

use Illuminate\Database\Eloquent\Model;
use Artisan;
use Config;

class Organism extends Model
{
    protected $fillable = ['name', 'code'];

    public function database()
    {
    	return $this->hasOne('Database');
    }

    public function staff()
    {
        return $this->hasMany('User');
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
		return $database->establish_connection();
    } 

    public function set_default_db_config()
    {
        $connection = new ConnectionCFG(); //Sets the default database connection;
    }

    public function run_migrations()
    {
        $migrate_install = Artisan::call('migrate:install', [
            '--database' => $this->database->name,
            ]);
        return $this->migrate();
    }

    public function rollback_migrations()
    {
        return Artisan::call('migrate:rollback', [
                            '--database' => $this->database->name,
                            '--path'     => 'database/migrations/tenants'
                        ]);
    }

    public function migrate()
    {
        return Artisan::call('migrate', [
                            '--database' => $this->database->name,
                            '--path'     => 'database/migrations/tenants'
                        ]);
    }

    public function table($table)
    {
        $connection = $this->database->connect();
        return $this->database->table($table);
    }

    public function users()
    {
        return $this->table('users');
    }

    public function students()
    {
        return $this->table('students');
    }

}
