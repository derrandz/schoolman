<?php

namespace App\Models\Internals\Contracts;

interface OrganismsInterface
{
    public function all();
    public function find($id);
    public function destroy();
}
