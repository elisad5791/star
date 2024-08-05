<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst(fake()->words(5, true));
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->text(200),
            'profile_id' => User::inRandomOrder()->first()->profile->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'views' => 0,
            'is_commentable' => true
        ];
    }
}
