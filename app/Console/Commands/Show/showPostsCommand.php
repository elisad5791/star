<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\PostResource;
use App\Models\Post;
use Illuminate\Console\Command;

class showPostsCommand extends Command
{
    protected $signature = 'show:posts';
    protected $description = 'Show all posts';

    public function handle()
    {
        $posts = PostResource::collection(Post::all())->resolve();
        dd($posts);
    }
}
