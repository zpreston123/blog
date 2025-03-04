<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_auth_user_can_access_posts_view(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts');

        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_posts_page(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }

    public function test_auth_user_does_not_have_posts()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts');

        $this->expectsDatabaseQueryCount(0);
    }

    public function test_auth_user_has_posts()
    {
        $user = User::factory()->create();
        $posts = Post::factory()->count(3)->for($user)->create();

        $response = $this->actingAs($user)->get('/posts');

        $this->expectsDatabaseQueryCount(3);
    }
}
