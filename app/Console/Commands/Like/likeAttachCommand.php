<?php

namespace App\Console\Commands\Like;

use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class likeAttachCommand extends Command
{
    protected $signature = 'like:attach';
    protected $description = 'Show like attach';

    public function handle()
    {
        $post = Post::inRandomOrder()->first();
        dump($post->likes->pluck('id')->toArray());

        $profileId = User::inRandomOrder()->first()->profile->id;
        dump($profileId);

        $post->likes()->attach($profileId);
        $post->refresh();
        dd($post->likes->pluck('id')->toArray());
    }
}
