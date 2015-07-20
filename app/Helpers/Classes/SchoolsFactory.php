<?php

namespace App\Helpers\Classes;

use Illuminate\Database\Eloquent\Model;
use Artisan;

use School;

class SchoolsFactory
{
	protected $school;
    protected $name;
    protected $code;
    protected $connect;


    public static function create($params)
    {
    	$instance = new static($params['name'], $params['code']);
    	
        $instance->setup();

    	return $instance;
    }


    public function __construct($name, $code)
    {
    	
        $this->name    = $name;
        $this->code    = $code;

    }

    public function setup()
    {
    	$this->create_school();
        $this->create_db_and_connect();
        $this->run_migrations();

    	return $this->school;
    }

    public function reset_default_db_config()
    {
        $this->school->set_default_db_config();
    }

    public function create_school()
    {
    	$this->school = School::create([
    		'name' => $this->name,
    		'code' => $this->code,
    		]);
    }

    public function create_db()
    {
        $db_name = 'database_of_'.(str_replace(" ","_",$this->name));
        $this->school->create_database(array('name' => $db_name,));
    }

    public function configure_database()
    {
        return $this->school->configure_database();
    }

	public function create_db_and_connect()
	{
		$this->create_db();
		$this->school->connect_to_database();
	}


	public function run_migrations()
	{
        return $this->school->run_migrations();
    }

}

