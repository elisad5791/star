<?php

namespace App\Console\Commands\Like;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Console\Command;

class likeWithoutCommand extends Command
{
    protected $signature = 'like:without';
    protected $description = 'Show like syncWithoutDetaching';

    public function handle()
    {
        $comment = Comment::inRandomOrder()->first();
        dump($comment->likes->pluck('id')->toArray());

        $profileIds = User::inRandomOrder()
            ->take(3)
            ->get()
            ->map(fn ($user) => $user->profile->id)->toArray();
        dump($profileIds);

        $comment->likes()->syncWithoutDetaching($profileIds);
        $comment->refresh();
        dd($comment->likes->pluck('id')->toArray());
    }
}
