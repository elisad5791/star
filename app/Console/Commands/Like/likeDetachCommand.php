<?php

namespace App\Console\Commands\Like;

use App\Models\Post;
use Illuminate\Console\Command;

class likeDetachCommand extends Command
{
    protected $signature = 'like:detach';
    protected $description = 'Show like detach';

    public function handle()
    {
        $post = Post::inRandomOrder()->first();
        $likes = $post->likes->pluck('id')->toArray();
        dump($likes);

        $profilesIds = array_slice($likes, 0, 2);
        dump($profilesIds);

        $post->likes()->detach($profilesIds);
        $post->refresh();
        dd($post->likes->pluck('id')->toArray());
    }
}
