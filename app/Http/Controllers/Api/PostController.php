<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\PostException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $posts = Post::filter($data)->get();
        return PostResource::collection($posts)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::firstOrCreate(['title' => $data['title']], $data);
        PostException::checkIfExists($post, 'post-create');
        return PostResource::make($post)->resolve();
    }

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        $title = $data['title'];
        $post = Post::updateOrCreate(['title' => $title], $data);
        PostException::checkIfExists($post, 'post-update');
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}
