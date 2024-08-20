<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Picture\StoreRequest;
use App\Http\Requests\Admin\Picture\UpdateRequest;
use App\Http\Resources\Admin\Picture\CategoryResource;
use App\Http\Resources\Admin\Picture\EditResource;
use App\Http\Resources\Admin\Picture\IndexResource;
use App\Http\Resources\Admin\Picture\ShowResource;
use App\Http\Resources\Admin\Picture\TagResource;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Tag;
use App\Services\Admin\PictureService;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = IndexResource::collection(Picture::latest()->get())->resolve();
        return inertia('Admin/Picture/Index', compact('pictures'));
    }

    public function show(Picture $picture)
    {
        $picture = ShowResource::make($picture)->resolve();
        return inertia('Admin/Picture/Show', compact('picture'));
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        $tags = TagResource::collection(Tag::all())->resolve();
        return inertia('Admin/Picture/Create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        PictureService::store($data);
        return redirect()->route('admin.pictures.index');
    }

    public function edit(Picture $picture)
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        $tags = TagResource::collection(Tag::all())->resolve();
        $picture = EditResource::make($picture)->resolve();
        return inertia('Admin/Picture/Edit', compact('picture', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Picture $picture)
    {
        $data = $request->validationData();
        PictureService::update($data, $picture);
        return redirect()->route('admin.pictures.index');
    }

    public function destroy(Picture $picture)
    {
        PictureService::delete($picture);
        return redirect()->route('admin.pictures.index');
    }
}
