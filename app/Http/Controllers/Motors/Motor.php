<?php

namespace App\Http\Controllers\Motors;

use App\Http\Controllers\Traits\CRUDtrait;

abstract class Motor
{
	protected $model;
	protected $supmodel;
	protected $view;

	public function getRepo()
	{
		return $this->model;
	}
	use \CRUDtrait;
}