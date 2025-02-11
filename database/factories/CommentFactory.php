<?php

namespace Database\Factories;

use App\Models\{Comment, Post, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'body' => $this->faker->sentence,
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id
        ];
    }
}
