<?php

namespace App\Http\Controllers\Traits;
use View;

trait CRUDtrait
{

	public function index()
	{
		$all = $this->model->all();
		return View::make($this->view.'.index', ['all' => $all]);
	}


	public function create()
	{
		return view($this->view.'.create');
	}


	public function store()
	{
		$data = array();
		$attributes = $this->model->attributes;

		foreach($attributes as $attr)
		{
			$data[] = Input::get( toString($attr) );
		}

		if( !($this->model->create($data)) )
		{
			flash('danger', (Lang::has('create-failure') ? Lang::get('create-failure') : 'Set message'));
			return view($this->view.'.create');
		}

		flash('success', (Lang::has('create-success') ? Lang::get('create-success') : 'Set message'));
		return view($this->view.'.create');

	}


	public function edit()
	{

	}


	public function update()
	{

	}


	public function delete()
	{

	}


}