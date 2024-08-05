<?php

namespace App\Console\Commands\Tag;

use App\Models\Tag;
use App\Models\Video;
use Illuminate\Console\Command;

class tagWithoutCommand extends Command
{
    protected $signature = 'tag:without';
    protected $description = 'Show tag syncWithoutDetaching';

    public function handle()
    {
        $video = Video::inRandomOrder()->first();
        dump($video->tags->pluck('id')->toArray());

        $tagIds = Tag::inRandomOrder()->take(3)->get()->pluck('id')->toArray();
        dump($tagIds);

        $video->tags()->syncWithoutDetaching($tagIds);
        $video->refresh();
        dd($video->tags->pluck('id')->toArray());
    }
}
