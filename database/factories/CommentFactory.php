<?php

namespace Database\Factories;

use App\Models\{Comment, Post, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
		return [
			'body' => $this->faker->sentence,
			'user_id' => User::all()->random()->id,
			'post_id' => Post::all()->random()->id
		];
    }
}
