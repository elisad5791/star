<?php

namespace App\Console\Commands\Tag;

use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Console\Command;

class tagToggleCommand extends Command
{
    protected $signature = 'tag:toggle';
    protected $description = 'Show tag toggle';

    public function handle()
    {
        $picture = Picture::inRandomOrder()->first();
        dump($picture->tags->pluck('id')->toArray());

        $tagIds = Tag::inRandomOrder()->take(5)->get()->pluck('id')->toArray();
        dump($tagIds);

        $picture->tags()->toggle($tagIds);
        $picture->refresh();
        dd($picture->tags->pluck('id')->toArray());
    }
}
