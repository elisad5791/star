<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Api\Category\IndexRequest;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $categories = Category::filter($data)->get();
        return CategoryResource::collection($categories)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        return CategoryResource::make($category)->resolve();
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category)->resolve();
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return CategoryResource::make($category)->resolve();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
