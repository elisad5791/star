<?php

namespace App\Http\Controllers\Main;

use App\Http\Resources\Api\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostResource::collection(Post::all())->resolve();
        return $posts;
    }

    public function show(Post $post)
    {
        return $post;
    }
}
