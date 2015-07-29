<?php

namespace App\Http\Controllers\Motors\Tenants;

use ExamsRepoInterface;
use Motor;

class ExamMotor extends Motor
{
	public function __construct(ExamsRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'tenants.exams';
		$this->modelName        = 'exams';
		$this->routePrefix = 'schools';
	}
}