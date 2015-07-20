<?php

namespace App\Http\Controllers\Motors;

use SchoolsRepoInterface;

class SchoolMotor extends Motor
{
	public function __construct(SchoolsRepoInterface $model)
	{
		$this->model = $model;
		$this->view = 'schools';
	}
}