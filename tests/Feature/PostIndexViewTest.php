<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostIndexViewTest extends TestCase
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
}
