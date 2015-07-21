<?php

namespace App\Http\Controllers\Traits;
use View;
use Input;
use Lang;
use Redirect;

/*
|
|
|$this refers to the implementing motor.
|
|
*/
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


	public function show($id)
	{
		if( ! ( $instance = $this->model->find($id) ))
		{
			flash('warning', "There is no such record in our database!");
			return RedirectToRoute('dashboard.schools.index', [ 'all' => $this->model->all() ]);
		}

		return view($this->view.'.show', ['instance' => $instance]);
	}

	public function store()
	{
		$attributes = $this->model->attributes;
		$data       = getInput($attributes);

		if( !( $this->model->create($data) ) )
		{
			flash('danger', (Lang::has('crud.create-failure') ? Lang::get('crud.create-failure') : 'Set message'));
			return view($this->view.'.create');
		}

		if($this->view == "schools") //treating a special case, real bad practice, will be replaced soon enough.
		{
			set_database(['central_database']);
		}

		flash('success', (Lang::has('crud.create-success') ? Lang::get('crud.create-success') : 'Set message'));
		return RedirectToRoute('dashboard.schools.create', ['all' => $this->model->all()]);

	}


	public function edit($id)
	{
		return view($this->view.'.edit', ['instance' => $this->model->find($id)]);
	}


	public function update($id)
	{
		$attributes = $this->model->attributes;
		$data = getInput($attributes);

		if( !($this->model->update($id, $data)) )
		{
			flash('danger', (Lang::has('crud.update-failure') ? Lang::get('crud.update-failure') : 'Set message'));
			return $this->index();
		}

		flash('success', (Lang::has('crud.update-success') ? Lang::get('crud.update-success') : 'Set message'));

		return RedirectToRoute('dashboard.schools.index',['all' => $this->model->all()]);
	}

	public function delete($id)
	{
		return view($this->view.'.delete', ['instance' => $this->model->find($id)]);
	}

	public function destroy($id)
	{
		$instance  = $this->model->find($id);
		
		if( !( $instance->destroy($id) ) )
		{
			flash('danger', (Lang::has('crud.destroy-failure') ? Lang::get('crud.destroy-failure') : 'Set message'));
			return $this->index();
		}

		flash('success', (Lang::has('crud.destroy-success') ? Lang::get('crud.destroy-success') : 'Set message'));
		return RedirectToRoute('dashboard.schools.index', ['all' => $this->model->all()]);
	}

}