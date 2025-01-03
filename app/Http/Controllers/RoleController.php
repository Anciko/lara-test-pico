<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('permission', 'create_role')) {
            return "You do have the permission to access";
        }

        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        if (!Gate::allows('permission', 'create_role')) {
            return "You do have the permission to access";
        }

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        $role->permissions()->attach($request->permission_ids);

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if (!Gate::allows('permission', 'update_role')) {
            return "You do have the permission to access";
        }

        $permissions = Permission::all();
        $old_permissions = $role->permissions->pluck('id')->toArray();
        return view('roles.edit', compact('role', 'permissions', 'old_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if (!Gate::allows('permission', 'update_role')) {
            return "You do have the permission to access";
        }

        $role->name = $request->name;
        $role->update();
        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if (!Gate::allows('permission', 'delete_role')) {
            return "You do have the permission to access";
        }

        $role->delete();
        $role->permissions()->detach();

        return redirect()->route('roles.index');
    }
}
