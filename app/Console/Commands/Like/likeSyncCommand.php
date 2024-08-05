<?php

namespace App\Console\Commands\Like;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Console\Command;

class likeSyncCommand extends Command
{
    protected $signature = 'like:sync';
    protected $description = 'Show like sync';

    public function handle()
    {
        $picture = Picture::inRandomOrder()->first();
        dump($picture->likes->pluck('id')->toArray());

        $profileIds = User::inRandomOrder()
            ->take(2)
            ->get()
            ->map(fn ($user) => $user->profile->id)->toArray();
        dump($profileIds);

        $picture->likes()->sync($profileIds);
        $picture->refresh();
        dd($picture->likes->pluck('id')->toArray());
    }
}
