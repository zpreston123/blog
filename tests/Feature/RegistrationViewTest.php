<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_using_registration_form()
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
