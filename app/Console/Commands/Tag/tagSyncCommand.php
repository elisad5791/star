<?php

namespace App\Console\Commands\Tag;

use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Console\Command;

class tagSyncCommand extends Command
{
    protected $signature = 'tag:sync';
    protected $description = 'Show tag sync';

    public function handle()
    {
        $picture = Picture::inRandomOrder()->first();
        dump($picture->tags->pluck('id')->toArray());

        $tagIds = Tag::inRandomOrder()->take(2)->get()->pluck('id')->toArray();
        dump($tagIds);

        $picture->tags()->sync($tagIds);
        $picture->refresh();
        dd($picture->tags->pluck('id')->toArray());
    }
}
