<?php

namespace App\DataLayer\Internals\Contracts;

interface CRUDInterface
{
    public function all();
    public function create(array $params);
    public function update($id, $params);
    public function find($id);
    public function destroy($id);
}
