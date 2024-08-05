<?php

namespace App\Console\Commands\Tag;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Console\Command;

class tagAttachCommand extends Command
{
    protected $signature = 'tag:attach';
    protected $description = 'Show tag attach';

    public function handle()
    {
        $post = Post::inRandomOrder()->first();
        dump($post->tags->pluck('id')->toArray());

        $tagId = Tag::inRandomOrder()->first()->id;
        dump($tagId);

        $post->tags()->attach($tagId);
        $post->refresh();
        dd($post->tags->pluck('id')->toArray());
    }
}
