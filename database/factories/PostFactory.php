<?php

namespace Database\Factories;

use App\Models\{Category, Post, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
		return [
		    'title' => $this->faker->sentence,
		    'body'  => $this->faker->paragraph,
		    'user_id' => User::all()->random()->id,
			'category_id' => Category::all()->random()->id
		];
    }
}
