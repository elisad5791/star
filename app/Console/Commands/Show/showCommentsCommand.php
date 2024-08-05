<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\CommentResource;
use App\Models\Comment;
use Illuminate\Console\Command;

class showCommentsCommand extends Command
{
    protected $signature = 'show:comments';
    protected $description = 'Show all comments';

    public function handle()
    {
        $comments = CommentResource::collection(Comment::all())->resolve();
        dd($comments);
    }
}
