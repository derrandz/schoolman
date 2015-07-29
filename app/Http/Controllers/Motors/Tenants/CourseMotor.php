<?php

namespace App\Http\Controllers\Motors\Tenants;

use CoursesRepoInterface;
use Motor;

class CourseMotor extends Motor
{
	public function __construct(CoursesRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'tenants.courses';
		$this->modelName   = 'courses';
		$this->routePrefix = 'schools';
	}
}