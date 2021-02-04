<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $factory->define(Post::class, function (Faker $faker) {
            return [
                'title' => '投稿のタイトル',
                'body' => "本文です。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。\n
                          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。
                          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
            ];
        // });
    }
}
