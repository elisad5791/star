<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Post::create($data);
        return redirect('/admin/posts');
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function edit(Post $post)
    {
        return '';
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return redirect('/admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts');
    }
}
