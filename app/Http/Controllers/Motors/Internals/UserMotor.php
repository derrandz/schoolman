<?php

namespace App\Http\Controllers\Motors\Internals;

use UsersRepoInterface;
use RolesRepoInterface;
use SchoolsRepoInterface;
use Input;
use Validator;
use Lang;

use Illuminate\Http\Request;
use Motor;


class UserMotor extends Motor
{
	use \CRUDtrait;


	public function __construct(UsersRepoInterface $model, RolesRepoInterface $supmodel1, SchoolsRepoInterface $supmodel2)
	{
		$this->model = $model;
		$this->supmodel1 = $supmodel1;
		$this->supmodel2 = $supmodel2;
		$this->view = 'users';
		$this->routePrefix = 'dashboard';
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
	
	public function createWithRolesAndSchool()
	{
		$selectArrayRole = IdAndNameSymArray($this->supmodel1);
		$selectArraySchool = IdAndNameSymArray($this->supmodel2);

		if( current_user_role() != 'SUPERADMIN' )
		{
			foreach($selectArrayRole as $key => $role)
			{
				if($role == 'SUPERADMIN')
				{
					unset($selectArrayRole[$key]);
				}
			}

		return view($this->view.'.create', ['roles' => $selectArrayRole]);
		}
		
		return view($this->view.'.create', ['roles' => $selectArrayRole, 'schools' => $selectArraySchool]);
	}

	public function storeOverriden(Request $request)
	{
		$role         = $this->supmodel1->find(Input::get('role'));

		$attributes   = $this->model->attributes;
		$data         = getInput($attributes);
		
		if( $failed = $this->validate($request->all()) )
		{
			flash('danger', (Lang::has('crud.create-failure') ? Lang::get('crud.create-failure') : 'Set message'));
			return $this->createWithRolesAndSchool();
		}

		if( !( $this->model->createWithRole($data, $role) ) )
		{
			flash('danger', (Lang::has('crud.create-failure') ? Lang::get('crud.create-failure') : 'Set message'));
			return $this->createWithRolesAndSchool();
		}

		flash('success', (Lang::has('crud.create-success') ? Lang::get('crud.create-success') : 'Set message'));
		return RedirectToRoute($this->routePrefix.'.'.$this->view.'.create', ['all' => $this->model->all()]);

	}
}