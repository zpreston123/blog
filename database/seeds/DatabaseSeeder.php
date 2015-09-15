<?php

use Blog\Post;
use Blog\User;
use Blog\Comment;
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

        // User::truncate();
        // Category::truncate();
        // Post::truncate();
        // Comment::truncate();

        factory(Category::class, 5)->create();
        factory(User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(Post::class, 50)->make());
            $user-comments()->save(factory(Comment::class, 20)->make());
        });

        Model::reguard();
    }
}
