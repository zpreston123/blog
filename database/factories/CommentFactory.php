<?php

use Faker\Generator as Faker;

$factory->define(Blog\Comment::class, function (Faker $faker) {
    return [
		'body' => $faker->sentence,
		'user_id' => Blog\User::all()->random()->id,
		'post_id' => Blog\Post::all()->random()->id
    ];
});
