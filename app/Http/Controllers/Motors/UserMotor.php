<?php

namespace App\Http\Controllers\Motors;

use UsersRepoInterface;
use RolesRepoInterface;
use Input;
use Validator;
use Lang;

use Illuminate\Http\Request;


class UserMotor extends Motor
{
	use \CRUDtrait;


	public function __construct(UsersRepoInterface $model, RolesRepoInterface $supmodel)
	{
		$this->model = $model;
		$this->supmodel = $supmodel;
		$this->view = 'users';
	}


	protected function validator(array $data)
	{
		return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
	}

	protected function validate(array $data)
	{
		$validator = $this->validator($data); 
       	return $validator->fails();
	}
	
	public function createWithRoles()
	{
		$roles_ids   = '' ; 
		$roles_names = '' ; 

		foreach($this->supmodel->all() as $role)
		{
			$roles_ids[]   =  $role->id;
			$roles_names[] =  $role->name;
		}

		$selectArray = array();
		$i           = 0;

		foreach($roles_ids as $roleid)
		{
			$selectArray[ (string)$roleid ] = $roles_names[$i];
			$i++;
		}

		return view($this->view.'.create', ['roles' => $selectArray]);
	}

	public function storeWithRoles(Request $request)
	{
		$role         = $this->supmodel->find(Input::get('role'));

		$attributes   = $this->model->attributes;
		$data         = getInput($attributes);
		
		if( $failed = $this->validate($request->all()) )
		{
			flash('danger', (Lang::has('crud.create-failure') ? Lang::get('crud.create-failure') : 'Set message'));
			return $this->createWithRoles();
		}

		if( !( $this->model->createWithRole($data, $role) ) )
		{
			flash('danger', (Lang::has('crud.create-failure') ? Lang::get('crud.create-failure') : 'Set message'));
			return $this->createWithRoles();
		}

		flash('success', (Lang::has('crud.create-success') ? Lang::get('crud.create-success') : 'Set message'));
		return RedirectToRoute('dashboard.schools.create', ['all' => $this->model->all()]);

	}
}