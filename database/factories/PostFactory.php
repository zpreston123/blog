<?php

use Faker\Generator as Faker;

$factory->define(Blog\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'user_id' => Blog\User::all()->random()->id,
		'category_id' => Blog\Category::all()->random()->id
    ];
});
