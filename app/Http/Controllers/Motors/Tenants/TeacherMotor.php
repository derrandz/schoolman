<?php

namespace App\Http\Controllers\Motors\Tenants;

use TeachersRepoInterface;
use Motor;

class TeacherMotor extends Motor
{
	public function __construct(TeachersRepoInterface $model)
	{
		$this->model = $model;
		$this->view = 'teachers';
	}
}