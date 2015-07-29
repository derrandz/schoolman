<?php

namespace App\Http\Controllers\Motors\Tenants;

use StudentsRepoInterface;
use Motor;

class StudentMotor extends Motor
{
	public function __construct(StudentsRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'tenants.students';
		$this->modelName   = 'students';
		$this->routePrefix = 'schools';
	}
}