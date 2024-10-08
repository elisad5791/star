<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\IndexRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Http\Resources\Admin\Post\CategoryResource;
use App\Http\Resources\Admin\Post\EditResource;
use App\Http\Resources\Admin\Post\IndexResource;
use App\Http\Resources\Admin\Post\ShowResource;
use App\Http\Resources\Admin\Post\TagResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Admin\PostService;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $search = $request->validated();
        $key = md5(implode($search));
        $posts = Cache::remember($key, now()->addMinutes(10), function () use ($search) {
            return IndexResource::collection(Post::filter($search)->paginate(10)->withQueryString());
        });
        return inertia('Admin/Post/Index', compact('posts', 'search'));
    }

    public function show(Post $post)
    {
        $post = ShowResource::make($post)->resolve();
        return inertia('Admin/Post/Show', compact('post'));
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        $tags = TagResource::collection(Tag::all())->resolve();
        return inertia('Admin/Post/Create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        PostService::store($data);
        return redirect()->back();
    }

    public function edit(Post $post)
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        $tags = TagResource::collection(Tag::all())->resolve();
        $post = EditResource::make($post)->resolve();
        return inertia('Admin/Post/Edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        PostService::update($data, $post);
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
