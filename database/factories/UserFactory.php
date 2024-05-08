<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'name' => fake()->name($gender),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'gender' => $gender,
            'avatar' => 'default-'.$gender.'.jpg',
            'password' => '$2y$12$Z/vhVO3e.UXKaG11EWgxc.EL7uej3Pi1M0Pq0orF5cbFGtyVh0V3C', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
