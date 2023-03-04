<?php

namespace Database\Seeders;

use App\Models\{Category, Comment, Post, Tag, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        User::factory(10)->create();
        Post::factory(20)->create();
        Comment::factory(40)->create();
        Tag::factory(4)->create();
    }
}
