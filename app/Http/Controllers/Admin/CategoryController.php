<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect('/admin/categories');
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function edit(Category $category)
    {
        return '';
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/categories');
    }
}
