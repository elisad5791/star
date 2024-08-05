<?php

namespace App\Console\Commands;

use App\Models\Picture;
use App\Models\Post;
use Illuminate\Console\Command;

class myCommand extends Command
{
    protected $signature = 'my';
    protected $description = 'My command';

    public function handle()
    {
        $picture = Picture::find(1);
        $picture->update(['title' => 'new title']);
        $post = Post::find(1);
        $post->delete();
        dump('done');
    }
}
