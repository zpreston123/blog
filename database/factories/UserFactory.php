<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Blog\User::class, function (Faker $faker) {
    static $password;

    $gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->name($gender),
        'email' => $faker->unique()->safeEmail,
        'gender' => $gender,
        'avatar' => 'default-'.$gender.'.jpg',
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});
