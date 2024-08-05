<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'login' => fake()->userName(),
            'phone' => fake()->phoneNumber(),
            'age' => fake()->numberBetween(18, 60),
            'profileable_id' => 1,
            'profileable_type' => User::class,
            'status' => 0
        ];
    }
}

