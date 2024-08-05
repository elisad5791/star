<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::factory(10)->create();

        foreach ($authors as $author) {
            Profile::factory()->create(['profileable_id' => $author->id, 'profileable_type' => Author::class]);
        }
    }
}
