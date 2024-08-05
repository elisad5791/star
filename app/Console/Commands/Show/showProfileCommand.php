<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\ProfileResource;
use App\Models\Profile;
use Illuminate\Console\Command;

class showProfileCommand extends Command
{
    protected $signature = 'show:profiles';
    protected $description = 'Show all profiles';

    public function handle()
    {
        $profiles = ProfileResource::collection(Profile::all())->resolve();
        dd($profiles);
    }
}
