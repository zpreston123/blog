<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeViewTest extends TestCase
{
    public function test_welcome_view_is_rendered()
    {
        $response = $this->get('/');

        $response->assertSuccessful();

        $response->assertSeeText('Welcome to Blog Xpress!');
    }
}
