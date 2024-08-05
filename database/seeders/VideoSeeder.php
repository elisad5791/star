<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = Video::factory(20)->create();
        $tags = Tag::all();
        foreach ($videos as $video) {
            $ids = $tags->random(rand(2, 4))->pluck('id')->toArray();
            $video->tags()->attach($ids);
        }
    }
}
