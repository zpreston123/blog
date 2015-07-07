<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory('App\User', 3)->create()->each(function ($user) {
            $user->posts()->save(factory('App\Post', 10));
        });

        Model::reguard();
    }
}
