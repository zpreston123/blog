<?php

namespace Database\Factories;

use App\Models\{Post, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'body' => fake()->sentence,
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id
        ];
    }
}
