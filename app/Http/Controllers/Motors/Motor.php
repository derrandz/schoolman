<?php

namespace App\Http\Controllers\Motors;

use App\Http\Controllers\Traits\CRUDtrait;

abstract class Motor
{
	protected $model;
	protected $supmodel1;
	protected $supmodel2;
	protected $view;
	protected $routePrefix;

	public function getRepo()
	{
		return $this->model;
	}
	use \CRUDtrait;
}