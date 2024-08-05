<?php

namespace App\Http\Controllers\Main;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function show(Category $category)
    {
        return $category;
    }
}
