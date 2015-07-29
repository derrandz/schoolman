<?php

namespace App\DataLayer\Internals\Repositories;

use CRUDInterface;
use User;
use Role;

class UsersRepository implements CRUDInterface
{

    public $attributes = ['name', 'email', 'password', 'school_id'];


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
            'school_id' => $params['school_id']
        ]);
    }

    public function find($id)
    {
    	return User::find($id);
    }
    
    public function update($id, $params = array())
    {
        $user            = $this->find($id);
        
        $user->name      = isset($params['name']) ? $params['name'] : $user->name;
        $user->email     = isset($params['email']) ? $params['email'] : $user->email;
        $user->password  = isset($params['password']) ? bcrypt($params['password']) : $user->password;
        $user->school_id = isset($params['school_id']) ? $params['school_id'] : $user->school_id;

        return $user->save();

    }

    public function createWithRole(array $params, Role $role)
    {
        $creation = $user = $this->create($params);
        $role_att = $user->attachRole($role);
        return $creation;
    }    

    public function UpdateWithRole($id, array $params, Role $role)
    {
        $user = $this->find($id);
        $user->detachMyRoles();    

        $creation = $this->update($id, $params);
        $role_att = $user->attachRole($role);

        return $creation && $user->save();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        return $user->delete();
    }

}
