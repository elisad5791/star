<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'title' => 'Admin'],
            ['id' => 2, 'title' => 'User'],
            ['id' => 3, 'title' => 'PostModerator'],
            ['id' => 4, 'title' => 'PictureModerator'],
            ['id' => 5, 'title' => 'VideoModerator']
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role, $role);
        }
    }
}
