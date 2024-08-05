<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\CategoryResource;
use App\Models\Category;
use Illuminate\Console\Command;

class showCategoriesCommand extends Command
{
    protected $signature = 'show:categories';
    protected $description = 'Show all categories';

    public function handle()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        dd($categories);
    }
}
