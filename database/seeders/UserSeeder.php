<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Picture;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'client@mail.ru',
            'password' => Hash::make('password')
        ]);
        $user->permissions()->sync([1, 2, 3, 4, 5, 6]);
        Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);
            $user->roles()->sync([mt_rand(1, 5)]);
            $user->permissions()->sync([mt_rand(1, 6)]);
        }
    }
}
