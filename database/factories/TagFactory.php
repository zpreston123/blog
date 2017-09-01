<?php

use Faker\Generator as Faker;

$factory->define(Blog\Tag::class, function (Faker $faker) {
    return [
		'name' => $faker->unique()->word
    ];
});
