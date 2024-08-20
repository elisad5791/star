<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Http\Resources\Admin\Role\IndexResource;
use App\Http\Resources\Admin\Role\ShowResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = IndexResource::collection(Role::all())->resolve();
        return inertia('Admin/Role/Index', compact('roles'));
    }

    public function show(Role $role)
    {
        $role = ShowResource::make($role)->resolve();
        return inertia('Admin/Role/Show', compact('role'));
    }

    public function create()
    {
        return inertia('Admin/Role/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Role::create($data);
        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return inertia('Admin/Role/Edit', compact('role'));
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index');
    }
}
