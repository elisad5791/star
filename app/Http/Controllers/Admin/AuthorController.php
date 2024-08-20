<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\StoreRequest;
use App\Http\Requests\Admin\Author\UpdateRequest;
use App\Http\Resources\Admin\Author\IndexResource;
use App\Http\Resources\Admin\Author\ShowResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = IndexResource::collection(Author::all())->resolve();
        return inertia('Admin/Author/Index', compact('authors'));
    }

    public function show(Author $author)
    {
        $author = ShowResource::make($author)->resolve();
        return inertia('Admin/Author/Show', compact('author'));
    }

    public function create()
    {
        return inertia('Admin/Author/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Author::create($data);
        return redirect()->route('admin.authors.index');
    }

    public function edit(Author $author)
    {
        return inertia('Admin/Author/Edit', compact('author'));
    }

    public function update(UpdateRequest $request, Author $author)
    {
        $data = $request->validated();
        $author->update($data);
        return redirect()->route('admin.authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index');
    }
}
