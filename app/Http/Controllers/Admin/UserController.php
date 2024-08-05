<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/admin/users');
    }

    public function show(User $user)
    {
        return $user;
    }

    public function edit(User $user)
    {
        return '';
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect('admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/users');
    }
}
