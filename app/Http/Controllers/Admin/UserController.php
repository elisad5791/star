<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Resources\Admin\User\IndexResource;
use App\Http\Resources\Admin\User\ShowResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = IndexResource::collection(User::all())->resolve();
        return inertia('Admin/User/Index', compact('users'));
    }

    public function show(User $user)
    {
        $user = ShowResource::make($user)->resolve();
        return inertia('Admin/User/Show', compact('user'));
    }

    public function create()
    {
        return inertia('Admin/User/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return inertia('Admin/User/Edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
