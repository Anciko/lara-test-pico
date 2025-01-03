<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();
        return view('admin-users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('permission', 'create_user')) {
            return "You do have the permission to access";
        }

        $roles = Role::all();
        return view('admin-users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (!Gate::allows('permission', 'create_user')) {
            return "You do have the permission to access";
        }

        $userData = $request->all();
        $userData['password'] = Hash::make($request->password);
        User::create($userData);

        return redirect()->route('admin-users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $adminUser)
    {
        if (!Gate::allows('permission', 'update_user')) {
            return "You do have the permission to access";
        }

        $roles = Role::all();
        $oldRole = $adminUser->role->id;
        return view('admin-users.edit', compact('adminUser', 'roles', 'oldRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $adminUser)
    {
        if (!Gate::allows('permission', 'update_user')) {
            return "You do have the permission to access";
        }

        $adminUser->update($request->all());
        return redirect()->route('admin-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $adminUser)
    {
        if (!Gate::allows('permission', 'delete_user')) {
            return "You do have the permission to access";
        }

        $adminUser->delete();
        return redirect()->route('admin-users.index');
    }
}
