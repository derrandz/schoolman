<?php

namespace App\DataLayer\Internals\Repositories;

use CRUDInterface;
use User;

class UsersRepository implements CRUDInterface
{
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
    	return School::find($id);
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
}
