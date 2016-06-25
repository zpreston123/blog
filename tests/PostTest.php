<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
	use WithoutMiddleware;

    /**
     * Test creating a post.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->visit('/home');
        $this->visit('/posts/create');
        $this->type('Test Post', 'title');
        $this->select('59', 'category');
        $this->type('This is the content.', 'body');
        $this->press('action');
        $this->seePageIs('/posts');
    }

    /**
     * Test updating a post.
     *
     * @return void
     */
    public function testUpdate()
    {
        $this->visit('/posts');
        $this->visit('/posts/7/edit');
        $this->type('My Post', 'title');
        $this->type('My content updated.', 'body');
        $this->press('action');
        $this->seePageIs('/home');
    }
}
