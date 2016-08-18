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
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
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
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'user_id' => Blog\User::all()->random()->id,
        'category_id' => Blog\Category::all()->random()->id
    ];
});

$factory->define(Blog\Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => Blog\User::all()->random()->id,
        'post_id' => Blog\Post::all()->random()->id
    ];
});
