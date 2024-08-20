<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Http\Requests\Admin\Video\UpdateRequest;
use App\Http\Resources\Admin\Video\CategoryResource;
use App\Http\Resources\Admin\Video\EditResource;
use App\Http\Resources\Admin\Video\IndexResource;
use App\Http\Resources\Admin\Video\ShowResource;
use App\Http\Resources\Admin\Video\TagResource;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Video;
use App\Services\Admin\VideoService;

class VideoController extends Controller
{
    public function index()
    {
        $videos = IndexResource::collection(Video::latest()->get())->resolve();
        return inertia('Admin/Video/Index', compact('videos'));
    }

    public function show(Video $video)
    {
        $video = ShowResource::make($video)->resolve();
        return inertia('Admin/Video/Show', compact('video'));
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        $tags = TagResource::collection(Tag::all())->resolve();
        return inertia('Admin/Video/Create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        VideoService::store($data);
        return redirect()->route('admin.videos.index');
    }

    public function edit(Video $video)
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        $tags = TagResource::collection(Tag::all())->resolve();
        $video = EditResource::make($video)->resolve();
        return inertia('Admin/Video/Edit', compact('video', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Video $video)
    {
        $data = $request->validationData();
        VideoService::update($data, $video);
        return redirect()->route('admin.videos.index');
    }

    public function destroy(Video $video)
    {
        VideoService::delete($video);
        return redirect()->route('admin.videos.index');
    }
}
