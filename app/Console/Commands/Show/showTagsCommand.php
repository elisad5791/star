<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\TagResource;
use App\Models\Tag;
use Illuminate\Console\Command;

class showTagsCommand extends Command
{
    protected $signature = 'show:tags';
    protected $description = 'Show all tags';

    public function handle()
    {
        $tags = TagResource::collection(Tag::all())->resolve();
        dd($tags);
    }
}
