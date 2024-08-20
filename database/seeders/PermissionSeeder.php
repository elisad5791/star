<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'title' => 'post-update'],
            ['id' => 2, 'title' => 'post-delete'],
            ['id' => 3, 'title' => 'picture-update'],
            ['id' => 4, 'title' => 'picture-delete'],
            ['id' => 5, 'title' => 'video-update'],
            ['id' => 6, 'title' => 'video-delete']
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission, $permission);
        }

        $role = Role::find(1);
        $role->permissions()->sync([1, 2, 3, 4, 5, 6]);
        $role = Role::find(3);
        $role->permissions()->sync([1, 2]);
        $role = Role::find(4);
        $role->permissions()->sync([3, 4]);
        $role = Role::find(5);
        $role->permissions()->sync([5, 6]);
    }
}
