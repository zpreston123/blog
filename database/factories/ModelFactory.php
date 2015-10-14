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

$factory->define(Blog\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Blog\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});

$factory->define(Blog\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->title,
        'body'  => $faker->paragraph
    ];
});

$factory->define(Blog\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(Blog\Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph
    ];
});
