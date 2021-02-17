<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Post::factory()->count(2)->create();

        $this->call([PostsTableSeeder::class]);
        // $this->call([UsersTableSeeder::class]);

        // Post::factory()->count(3)->create();
    }
}
