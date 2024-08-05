<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            AuthorSeeder::class,
            PostSeeder::class,
            PictureSeeder::class,
            VideoSeeder::class,
            CommentSeeder::class,
            LikeSeeder::class
        ]);
    }
}
