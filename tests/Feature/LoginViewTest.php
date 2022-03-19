<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_using_the_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/posts');
    }

    public function test_auth_user_can_access_posts_view()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts');

        $response->assertStatus(200);
    }
    public function test_unauth_user_cannot_access_posts_page()
    {
        $response = $this->get('/posts');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }
}
