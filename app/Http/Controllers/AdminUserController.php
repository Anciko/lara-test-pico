<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;

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
        $roles = Role::all();
        return view('admin-users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

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
        $roles = Role::all();
        $oldRole = $adminUser->role->id;
        return view('admin-users.edit', compact('adminUser', 'roles', 'oldRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $adminUser)
    {
        $adminUser->update($request->all());
        return redirect()->route('admin-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $adminUser)
    {
        $adminUser->delete();
        return redirect()->route('admin-users.index');
    }
}
