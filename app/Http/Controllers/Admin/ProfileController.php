<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\Profile\StoreRequest;
use App\Http\Requests\Admin\Profile\UpdateRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return $profiles;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Profile::create($data);
        return redirect('admin/profiles');
    }

    public function show(Profile $profile)
    {
        return $profile;
    }

    public function edit(Profile $profile)
    {
        return '';
    }

    public function update(UpdateRequest $request, Profile $profile)
    {
        $data = $request->validated();
        $profile->update($data);
        return redirect('/admin/profiles');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect('admin/profiles');
    }
}
