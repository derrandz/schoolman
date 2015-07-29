<?php

namespace App\Http\Controllers\Motors\Tenants;

use ResultsRepoInterface;
use Motor;

class ResultMotor extends Motor
{
	public function __construct(ResultsRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'tenants.results';
		$this->modelName   = 'results';
		$this->routePrefix = 'schools';
	}
}