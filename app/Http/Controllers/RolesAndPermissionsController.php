<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Role;
use Permission;

class RolesAndPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $permissions = Permission::all();
        $checked_permissions = array();

        foreach($permissions as $permission)
        {
            $permissions_request[] = $request->input($permission->name);
        }

        $role                     = new Role;
        
        $role->name               = $request->input('role_name');;
        $role->display_name       = $request->input('role_display_name');
        $role->description        = $request->input('role_description');

        if( $role->save() )
        {
            if( $permission->save() )
            {
                $role->attachPermission($permission);
                flash("success", "Role and its permissions have been created successfully.");
                return view('roles.index');
            }
            else
            {
                flash("warning", "Failed to create the permission");
            }
        }
        else
        {
            flash("warning", "Failed to create the role");
            return view('role.create');
        }
    }

    public function create_role()
    {
        return view('roles.create_role');
    }

    public function store_role(Request $request)
    {
        $name                     = $request->input('name');
        $display_name             = $request->input('display_name');
        $description              = $request->input('description');
        
        $role               = new Role;
        $role->name         = $name;
        $role->display_name = $display_name;
        $role->description  = $description;

        if( $role->save() )
        {
            flash('success', 'The new level of access has been created successfully');
            return $this->create_role();
        }
        else
        {
            flash('danger', 'There was an unexpected error, please retry later');
            return $this->create_role();
        }
    }

    public function create_permission()
    {
        return view('roles.create_permission');
    }

    public function store_permission(Request $request)
    {
        $name                     = $request->input('name');
        $display_name             = $request->input('display_name');
        $description              = $request->input('description');
        
        $permission               = new Permission;
        $permission->name         = $name;
        $permission->display_name = $display_name;
        $permission->description  = $description;

        if( $permission->save() )
        {
            flash('success', 'The new permission has been created successfully');
            return $this->create_permission();
        }
        else
        {
            flash('danger', 'There was an unexpected error, please retry later');
            return $this->create_permission();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
