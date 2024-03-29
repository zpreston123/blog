<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_using_registration_form(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'tuser@example.com',
            'gender' => 'male',
            'avatar' => 'default-male.jpg',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertRedirect('/posts');
    }
}
