<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Artisan;

class OrganismSetup
{
	protected $org;
    protected $name;
    protected $code;
    protected $plug;


    public static function create($params)
    {
    	$instance = new static($params['name'], $params['code'], $params['plug']);
    	
        $instance->setup();

    	return $instance;
    }


    public function __construct($name, $code, $plug)
    {
    	
    	$this->name = $name;
    	$this->code = $code;
        $this->plug = $plug;

    }

    public function setup()
    {
    	$this->create_organism();
    	
        if($this->plug)
        {
            $this->create_db_and_connect();
        }
        else
        {
            $this->create_db();
        }

    	$this->run_migrations();

    	return $this->org;
    }

    public function create_organism()
    {
    	$this->org = Organism::create([
    		'name' => $this->name,
    		'code' => $this->code,
    		]);
    }

    public function create_db()
    {
        $db_name = 'database_of_'.(str_replace(" ","_",$this->name));
        $this->org->create_database(array('name' => $db_name,));
    }


	public function create_db_and_connect()
	{
		$db_name = 'database_of_'.(str_replace(" ","_",$this->name));
		$this->org->create_database(array('name' => $db_name,));
		$this->org->connect_to_database();
	}


	public function run_migrations()
	{
        return $this->org->run_migrations();
    }



}

