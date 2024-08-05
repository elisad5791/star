<?php

namespace App\Http\Controllers\Main;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        return redirect()->back();
    }
}
