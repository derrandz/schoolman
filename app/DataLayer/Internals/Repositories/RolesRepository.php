<?php

namespace App\DataLayer\Internals\Repositories;

use CRUDInterface;
use Role;

class RolesRepository implements CRUDInterface
{
    public function all()
    {
    	return Role::all();
    }

    public function create(array $params)
    {
        return Role::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => bcrypt($params['password']),
        ]);
    }

    public function find($id)
    {
    	return Role::find($id);
    }

    public function update($id, $params = array())
    {
        $role           = Role::find($id);
        $role->name     = $params['name'];
        $role->email    = $params['email'];
        $role->password = bcrypt($params['password']);

        return $role->save();
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        return $role->delete();
    }
}
