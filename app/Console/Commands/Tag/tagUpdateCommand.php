<?php

namespace App\Console\Commands\Tag;

use App\Models\Video;
use Illuminate\Console\Command;

class tagUpdateCommand extends Command
{
    protected $signature = 'tag:update';
    protected $description = 'Show tag updateExistingPivot';

    public function handle()
    {
        $video = Video::inRandomOrder()->first();
        $updated = $video->tags_with_pivots->map(fn($tag) => $tag->pivot->updated_at)->all();
        dump($updated);

        $tags = $video->tags->pluck('id')->toArray();
        dump($tags);
        $tagIds = array_slice($tags, 0, 2);
        dump($tagIds);

        $video->tags()->updateExistingPivot($tagIds, ['updated_at' => date('Y-m-d H:i:s')]);
        $video->refresh();
        $updated = $video->tags_with_pivots->map(fn($tag) => $tag->pivot->updated_at)->all();
        dd($updated);
    }
}
