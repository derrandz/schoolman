<?php

namespace App\DataLayer\Internals\Objects;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $fillable = ['name', 'display_name', 'description'];
}
