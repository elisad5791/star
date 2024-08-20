<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\UpdateRequest;
use App\Http\Resources\Admin\Comment\IndexResource;
use App\Http\Resources\Admin\Comment\ShowResource;
use App\Http\Resources\Main\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = IndexResource::collection(Comment::all())->resolve();
        return inertia('Admin/Comment/Index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        $comment = ShowResource::make($comment)->resolve();
        return inertia('Admin/Comment/Show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return inertia('Admin/Comment/Edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('admin.comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }
}
