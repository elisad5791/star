<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\StoreRequest;
use App\Http\Requests\Admin\Profile\UpdateRequest;
use App\Http\Resources\Admin\Profile\IndexResource;
use App\Http\Resources\Admin\Profile\ShowResource;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = IndexResource::collection(Profile::all())->resolve();
        return inertia('Admin/Profile/Index', compact('profiles'));
    }

    public function show(Profile $profile)
    {
        $profile = ShowResource::make($profile)->resolve();
        return inertia('Admin/Profile/Show', compact('profile'));
    }

    public function create()
    {
//        return inertia('Admin/Profile/Create');
    }

    public function store(StoreRequest $request)
    {
//        $data = $request->validated();
//        Profile::create($data);
//        return redirect()->route('admin.profiles.index');
    }

    public function edit(Profile $profile)
    {
//        return inertia('Admin/Profile/Edit', compact('profile'));
    }

    public function update(UpdateRequest $request, Profile $profile)
    {
//        $data = $request->validated();
//        $profile->update($data);
//        return redirect()->route('admin.profiles.index');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('admin.profiles.index');
    }
}
