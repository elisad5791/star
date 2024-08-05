<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Admin\Comment\UpdateRequest;
use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return $comments;
    }

    public function create()
    {
        return '';
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        return redirect('/admin/comments');
    }

    public function show(Comment $comment)
    {
        return $comment;
    }

    public function edit(Comment $comment)
    {
        return '';
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect('/admin/comments');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('/admin/comments');
    }
}
