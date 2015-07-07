<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Blog\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Blog\Category::class, function ($faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(Blog\Post::class, function ($faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->paragraph
    ];
});

$factory->define(Blog\Comment::class, function ($faker) {
    return [
        'body' => $faker->sentence
    ];
});
