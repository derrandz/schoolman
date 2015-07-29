<?php

namespace App\Http\Controllers\Motors\Internals;

use SchoolsRepoInterface;
use Motor;

class SchoolMotor extends Motor
{
	public function __construct(SchoolsRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'internals.schools';
		$this->modelName   = 'schools';
		$this->routePrefix = 'admin';
	}
}