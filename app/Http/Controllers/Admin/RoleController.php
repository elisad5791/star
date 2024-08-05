<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Role::create($data);
        return redirect('admin/roles');
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function edit(Role $role)
    {
        return '';
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        return redirect('/admin/roles');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('admin/roles');
    }
}
