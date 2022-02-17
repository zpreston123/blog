<?php

namespace Database\Seeders;

use App\Models\{Category, Comment, Post, Tag, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();
        User::factory(10)->create();
        Post::factory(20)->create();
        Comment::factory(40)->create();
        Tag::factory(4)->create();
    }
}
