<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class OrganismSetup
{
	protected $org;
    protected $name;
    protected $code;


    public static function create($params)
    {
    	$instance = new static($params['name'], $params['code']);
    	$instance->setup();

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
    		'database' => $this->name,
    		'code' => $this->code,
    		]);
    }


	public function create_db_and_connection()
	{
		$db_name = 'database_of_'.$this->name;
		$this->org->create_database(array('name' => $db_name,));
		$this->org->connect_to_database();
	}


	public function run_migrations()
	{
		$this->org->run_migrations();
	}



}

