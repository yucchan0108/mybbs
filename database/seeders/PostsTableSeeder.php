<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Post::factory()->create();
        // Comment::factory()->create();
        factory(Post::class, 50)
            ->create()
            ->each(function ($posts) {
                $comments = factory(Comment::class, 2)->create();
                $post->comments()->saveMany($comments);
            }
            // 'user_id' => $faker->numberBetween(1, 20),
        );
    }
}
