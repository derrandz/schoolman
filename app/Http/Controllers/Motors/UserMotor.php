<?php

namespace App\Http\Controllers\Motors;

use UsersRepoInterface;

class UserMotor extends Motor
{
	public function __construct(UsersRepoInterface $model)
	{
		$this->model = $model;
		$this->view = 'users';
	}
}