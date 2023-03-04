<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeViewTest extends TestCase
{
    public function test_welcome_view_is_rendered(): void
    {
        $response = $this->get('/');

        $response->assertSuccessful();

        $response->assertSeeText('Welcome to Blog Xpress!');
    }
}
