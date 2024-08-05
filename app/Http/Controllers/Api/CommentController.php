<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Api\Comment\IndexRequest;
use App\Http\Requests\Api\Comment\StoreRequest;
use App\Http\Requests\Api\Comment\UpdateRequest;
use App\Http\Resources\Api\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $comments = Comment::filter($data)->get();
        return CommentResource::collection($comments)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $comment = Comment::create($data);
        return CommentResource::make($comment)->resolve();
    }

    public function show(Comment $comment)
    {
        return CommentResource::make($comment)->resolve();
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return CommentResource::make($comment)->resolve();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
