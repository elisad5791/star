<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Picture;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $posts = Post::all();
        $pictures = Picture::all();
        $videos = Video::all();
        $comments = Comment::all();

        foreach ($posts as $post) {
            $ids = $users->random(mt_rand(1, 3))->map(fn ($user) => $user->profile->id)->toArray();
            $post->likes()->attach($ids);
        }

        foreach ($pictures as $picture) {
            $ids = $users->random(mt_rand(1, 3))->map(fn ($user) => $user->profile->id)->toArray();
            $picture->likes()->attach($ids);
        }

        foreach ($videos as $video) {
            $ids = $users->random(mt_rand(1, 3))->map(fn ($user) => $user->profile->id)->toArray();
            $video->likes()->attach($ids);
        }

        foreach ($comments as $comment) {
            $ids = $users->random(mt_rand(1, 3))->map(fn ($user) => $user->profile->id)->toArray();
            $comment->likes()->attach($ids);
        }
    }
}
