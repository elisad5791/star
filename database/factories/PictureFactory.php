<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->words(3, true)),
            'url' => fake()->imageUrl(640, 480),
            'profile_id' => User::inRandomOrder()->first()->profile->id,
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
