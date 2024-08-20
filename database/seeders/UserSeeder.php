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
            'name' => 'client',
            'email' => 'client@mail.ru',
            'password' => Hash::make('password')
        ]);
        $user->roles()->sync([1]);
        Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('password')
        ]);
        $user->roles()->sync([1]);
        Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);
            $user->roles()->sync([mt_rand(1, 5)]);
            $user->permissions()->sync([mt_rand(1, 6)]);
        }
    }
}
