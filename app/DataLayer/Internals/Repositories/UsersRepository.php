<?php

namespace App\DataLayer\Internals\Repositories;

use CRUDInterface;
use User;
use Role;

class UsersRepository implements CRUDInterface
{

    public $attributes = ['name', 'email', 'password'];


    public function all()
    {
    	return User::all();
    }

    public function create(array $params)
    {
        return User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => bcrypt($params['password']),
        ]);
    }

    public function find($id)
    {
    	return User::find($id);
    }

    public function update($id, $params = array())
    {
        $user           = User::find($id);
        $user->name     = $params['name'];
        $user->email    = $params['email'];
        $user->password = bcrypt($params['password']);

        return $user->save();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        return $user->delete();
    }

    public function createWithRole(array $params, Role $role)
    {
        $creation = $user = $this->create($params);
        $role_att = $user->attachRole($role);
        return $creation;
    }
}
