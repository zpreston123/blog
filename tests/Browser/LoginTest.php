<?php

namespace Tests\Browser;

use Blog\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create([
            'email' => 'jdoe@example.com'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Log in')
                    ->assertPathIs('/posts');
        });
    }
}
