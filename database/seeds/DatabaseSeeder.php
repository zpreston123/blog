<?php

use Blog\Post;
use Blog\User;
use Blog\Category;
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

        factory(Category::class, 5)->create();
        factory(User::class, 10)->create();
        factory(Post::class, 20)->create();

        Model::reguard();
    }
}
