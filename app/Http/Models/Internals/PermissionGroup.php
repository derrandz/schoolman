<?php

namespace App\Http\Models\Internals;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table    = ['permission_groups'];
    protected $fillable = ['name'];


    public function permissions()
    {
    	return $this->hasMany('Permission');
    }

    public static function create($params = null)
    {
        $instance = new static(['name' => $params['name']]);
        return $instance->create_permissions($params['permissions']);
    }

    /**
    *
    *@var $params : nested array 
    *	  $params : array( "permission-1" => array(
    *											 "name" => ,
    *											 "display_name" => ,
    *											 "description" =>,),
    *					   "permission-2" => array()
    *					 etc..)
    * taking as many permissions as you wish.
    *
    *@return PermissionGroup
    */

    public function create_permissions($params = null)
    {
    	$i = 0;
    	foreach ($params as $permissionParams)
    	{
            $permission               = new Permission;
            $permission->name         = $permissionParams['name'];
            $permission->display_name = $permissionParams['display_name'];
            $permission->description  = $permissionParams['description'];
            $this->permissions()->save($permissions);
            $i++;
    	}  
        echo $i.' Permission created';
        return $this;
    }
}