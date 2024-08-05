<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\PictureResource;
use App\Models\Picture;
use Illuminate\Console\Command;

class showPicturesCommand extends Command
{
    protected $signature = 'show:pictures';
    protected $description = 'Show all pictures';

    public function handle()
    {
        $pictures = PictureResource::collection(Picture::all())->resolve();
        dd($pictures);
    }
}
