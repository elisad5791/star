<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->text(200),
            'profile_id' => User::inRandomOrder()->first()->profile->id,
            'commentable_id' => mt_rand(1, 20),
            'commentable_type' => fake()->randomElement([Post::class, Picture::class, Video::class]),
            'status' => 0
        ];
    }
}
