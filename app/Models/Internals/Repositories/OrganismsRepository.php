<?php

namespace App\Models\Internals\Repositories;

use Illuminate\Database\Eloquent\Model;

use OrganismsInterface;

class OrganismsRepository implements OrganismsInterface
{
    public function all()
    {
    	return Organism::all()->toArray();
    }

    public function find($id)
    {
    	return Organism::find($id);
    }
}
