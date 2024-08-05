<?php

namespace App\Console\Commands\Like;

use App\Models\Video;
use Illuminate\Console\Command;

class likeUpdateCommand extends Command
{
    protected $signature = 'like:update';
    protected $description = 'Show like updateExistingPivot';

    public function handle()
    {
        $video = Video::inRandomOrder()->first();
        $updated = $video->likes_with_pivots->map(fn($like) => $like->pivot->updated_at)->all();
        dump($updated);

        $likes = $video->likes->pluck('id')->toArray();
        dump($likes);
        $likeIds = array_slice($likes, 0, 1);
        dump($likeIds);

        $video->likes()->updateExistingPivot($likeIds, ['updated_at' => date('Y-m-d H:i:s')]);
        $video->refresh();
        $updated = $video->likes_with_pivots->map(fn($like) => $like->pivot->updated_at)->all();
        dd($updated);
    }
}
