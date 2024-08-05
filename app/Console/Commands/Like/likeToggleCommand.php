<?php

namespace App\Console\Commands\Like;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Console\Command;

class likeToggleCommand extends Command
{
    protected $signature = 'like:toggle';
    protected $description = 'Show like toggle';

    public function handle()
    {
        $picture = Picture::inRandomOrder()->first();
        dump($picture->likes->pluck('id')->toArray());

        $profileIds = User::inRandomOrder()
            ->take(4)
            ->get()
            ->map(fn ($user) => $user->profile->id)->toArray();
        dump($profileIds);

        $picture->likes()->toggle($profileIds);
        $picture->refresh();
        dd($picture->likes->pluck('id')->toArray());
    }
}
