<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\VideoResource;
use App\Models\Video;
use Illuminate\Console\Command;

class showVideosCommand extends Command
{
    protected $signature = 'show:videos';
    protected $description = 'Show all videos';

    public function handle()
    {
        $videos = VideoResource::collection(Video::all())->resolve();
        dd($videos);
    }
}
