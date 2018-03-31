<?php

use Blog\{Category, Comment, Post, Tag, User};
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Category::class, 5)->create();
        factory(User::class, 10)->create();
        factory(Post::class, 20)->create();
        factory(Comment::class, 40)->create();
        factory(Tag::class, 4)->create();

        Model::reguard();
    }
}
