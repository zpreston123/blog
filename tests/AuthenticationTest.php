<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use WithoutMiddleware;

	/**
     * Test registration.
     *
     * @return void
     */
    public function testRegistration()
    {
        $this->visit('/');
        $this->visit('/auth/register');
        $this->type('John Doe', 'name');
        $this->type('jdoe@example.com', 'email');
        $this->type('password', 'password');
        $this->type('password', 'password_confirmation');
        $this->press('');
        $this->seePageIs('/home');
    }

   	/**
   	 * Test login.
   	 *
   	 * @return void
   	 */
    public function testLogin()
    {
        $this->visit('/');
        $this->type('jdoe@example.com', 'email');
        $this->type('password', 'password');
        $this->press('Log in');
        $this->seePageIs('/home');
    }
}
