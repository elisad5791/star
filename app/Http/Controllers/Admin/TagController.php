<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return $tags;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::create($data);
        return redirect('/admin/tags');
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function edit(Tag $tag)
    {
        return '';
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect('/admin/tags');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/admin/tags');
    }
}
