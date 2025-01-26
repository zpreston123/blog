<?php

namespace Database\Factories;

use App\Models\{Category, Post, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => rtrim($this->faker->sentence(3), '.'),
            'body'  => $this->faker->paragraph,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
