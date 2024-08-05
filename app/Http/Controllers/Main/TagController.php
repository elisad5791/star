<?php

namespace App\Http\Controllers\Main;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return $tags;
    }

    public function show(Tag $tag)
    {
        return $tag;
    }
}
