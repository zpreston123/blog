<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_using_the_login_form(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/posts');
    }

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
