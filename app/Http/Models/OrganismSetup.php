<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Artisan;

class OrganismSetup
{
	protected $org;
    protected $name;
    protected $code;
    protected $connect;


    public static function create($params)
    {
    	$instance = new static($params['name'], $params['code'], $params['connect']);
    	
        $instance->setup();

    	return $instance;
    }


    public function __construct($name, $code, $connect)
    {
    	
        $this->name    = $name;
        $this->code    = $code;
        $this->connect = $connect;

    }

    public function setup()
    {
    	$this->create_organism();

        if(!($this->connect))
        {
            $this->create_db();
            $this->reset_default_db_config();
        }
        else
        {
            $this->create_db_and_connect();
            $this->run_migrations();
        }

    	return $this->org;
    }

    public function reset_default_db_config()
    {
        $this->org->set_default_db_config();
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

    public function configure_database()
    {
        return $this->org->configure_database();
    }

	public function create_db_and_connect()
	{
		$this->create_db();
		$this->org->connect_to_database();
	}


	public function run_migrations()
	{
        return $this->org->run_migrations();
    }



}

