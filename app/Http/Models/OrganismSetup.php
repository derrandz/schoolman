<?php

namespace App\Http\Models;

class OrganismSetup
{
	protected $org;
    protected $name;
    protected $code;


    public function create($params)
    {
    	$instance = new static($params['name'],$params['code']);
    	$insance->setup();

    	return $instance;
    }


    public function __construct($name, $code)
    {
    	
    	$this->name = $name;
    	$this->code = $code;

    }


    public function setup()
    {
    	$this->create_organism();
    	$this->create_db_and_connection();
    	$this->run_migrations();

    	return $this->org;
    }

    public function create_organism()
    {
    	$this->org = Organism::create([
    		'name' => $name,
    		'code' => $code
    		]);
    }


	public function create_db_and_connection()
	{
		$db_connection = $this->name.'_'.$this->code.'_db';
		DB::statement('CREATE DATABASE ?', [$db_connection]);

		App::make('setDbConnection', $db_connection);
	}


	public function run_migrations()
	{
		return Artisan::call('migrate', [
			'--database' => $db_connection,
			'--path'     => 'database/migrations/tenants'
		]);
	}



}

