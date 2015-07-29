<?php

namespace App\Http\Controllers\Motors\Tenants;

use SeminarRepoInterface;
use Motor;

class SeminarMotor extends Motor
{
	public function __construct(SeminarRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'tenants.seminars';
		$this->modelName   = 'seminars';
		$this->routePrefix = 'schools';
	}
}