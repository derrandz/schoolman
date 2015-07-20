<?php

namespace App\Http\Controllers\Motors;

use App\Http\Controllers\Traits\CRUDtrait;

abstract class Motor
{
	protected $model;

	public function getRepo()
	{
		return $this->model;
	}
	use \CRUDtrait;
}