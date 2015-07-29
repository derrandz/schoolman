<?php

namespace App\Http\Controllers\Motors;

use App\Http\Controllers\Traits\CRUDtrait;

abstract class Motor
{
	protected $model;
	protected $supmodel1;
	protected $supmodel2;
	protected $view;
	protected $modelName;
	protected $routePrefix;

	public function getRepo()
	{
		return $this->model;
	}

	public function getSchoolsManagerDashboard($repos = array())
	{
		return view('dashboard.school_manager', ['repos' => $repos]);
	}

	use \CRUDtrait;
}