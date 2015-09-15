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
        'password'       => bcrypt(str_random(10)),
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
        'user_id'     => factory(Blog\User::class)->create()->id,
        'category_id' => factory(Blog\Category::class)->create()->id,
        'title'       => $faker->unique()->title,
        'body'        => $faker->paragraph
    ];
});

$factory->define(Blog\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(Blog\User::class)->create()->id,
        'post_id' => factory(Blog\Post::class)->create()->id,
        'body'    => $faker->paragraph
    ];
});
