<?php

namespace App\Console\Commands\Tag;

use App\Models\Post;
use Illuminate\Console\Command;

class tagDetachCommand extends Command
{
    protected $signature = 'tag:detach';
    protected $description = 'Show tag detach';

    public function handle()
    {
        $post = Post::inRandomOrder()->first();
        $tags = $post->tags->pluck('id')->toArray();
        dump($tags);

        $tagIds = array_slice($tags, 0, 2);
        dump($tagIds);

        $post->tags()->detach($tagIds);
        $post->refresh();
        dd($post->tags->pluck('id')->toArray());
    }
}
