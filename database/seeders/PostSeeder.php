<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(20)->create();
        $tags = Tag::all();
        foreach ($posts as $post) {
            $ids = $tags->random(rand(2, 4))->pluck('id')->toArray();
            $post->tags()->attach($ids);
        }
    }
}
