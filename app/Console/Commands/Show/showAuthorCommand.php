<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\AuthorResource;
use App\Models\Author;
use Illuminate\Console\Command;

class showAuthorCommand extends Command
{
    protected $signature = 'show:authors';
    protected $description = 'Show all authors';

    public function handle()
    {
        $authors = AuthorResource::collection(Author::all())->resolve();
        dd($authors);
    }
}
