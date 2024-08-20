<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Resources\Admin\Category\IndexResource;
use App\Http\Resources\Admin\Category\ShowResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = IndexResource::collection(Category::all())->resolve();
        return inertia('Admin/Category/Index', compact('categories'));
    }

    public function show(Category $category)
    {
        $category = ShowResource::make($category)->resolve();
        return inertia('Admin/Category/Show', compact('category'));
    }

    public function create()
    {
        return inertia('Admin/Category/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return inertia('Admin/Category/Edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
