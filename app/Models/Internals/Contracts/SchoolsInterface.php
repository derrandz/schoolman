<?php

namespace App\Models\Internals\Contracts;

interface SchoolsInterface
{
    public function all();
    public function new_school($params = array());
    public function create($params = array());
    public function update($id, $params);
    public function find($id);
    public function destroy($id);
}
