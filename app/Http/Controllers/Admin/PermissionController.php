<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permission\StoreRequest;
use App\Http\Requests\Admin\Permission\UpdateRequest;
use App\Http\Resources\Admin\Permission\IndexResource;
use App\Http\Resources\Admin\Permission\ShowResource;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = IndexResource::collection(Permission::all())->resolve();
        return inertia('Admin/Permission/Index', compact('permissions'));
    }

    public function show(Permission $permission)
    {
        $permission = ShowResource::make($permission)->resolve();
        return inertia('Admin/Permission/Show', compact('permission'));
    }

    public function create()
    {
        return inertia('Admin/Permission/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Permission::create($data);
        return redirect()->route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        return inertia('Admin/Permission/Edit', compact('permission'));
    }

    public function update(UpdateRequest $request, Permission $permission)
    {
        $data = $request->validated();
        $permission->update($data);
        return redirect()->route('admin.permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index');
    }
}
