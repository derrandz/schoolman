<?php

namespace App\Models\Internals\Objects;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	public function group()
	{
		return $this->belongsTo('PermissionGroup');
	}
}
