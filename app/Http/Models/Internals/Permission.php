<?php

namespace App\Http\Models\Internals;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	public function group()
	{
		return $this->belongsTo('PermissionGroup');
	}
}
