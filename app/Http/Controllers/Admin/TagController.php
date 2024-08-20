<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Http\Resources\Admin\Tag\IndexResource;
use App\Http\Resources\Admin\Tag\ShowResource;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = IndexResource::collection(Tag::all())->resolve();
        return inertia('Admin/Tag/Index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $tag = ShowResource::make($tag)->resolve();
        return inertia('Admin/Tag/Show', compact('tag'));
    }

    public function create()
    {
        return inertia('Admin/Tag/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::create($data);
        return redirect()->route('admin.tags.index');
    }

    public function edit(Tag $tag)
    {
        return inertia('Admin/Tag/Edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('admin.tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
