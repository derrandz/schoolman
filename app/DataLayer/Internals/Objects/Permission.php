<?php

namespace App\DataLayer\Internals\Objects;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	protected $fillable = ['name', 'display_name', 'description'];
}
