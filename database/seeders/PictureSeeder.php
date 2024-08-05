<?php

namespace Database\Seeders;

use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pictures = Picture::factory(20)->create();
        $tags = Tag::all();
        foreach ($pictures as $picture) {
            $ids = $tags->random(rand(2, 4))->pluck('id')->toArray();
            $picture->tags()->attach($ids);
        }
    }
}
