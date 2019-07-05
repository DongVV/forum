<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guestsMayNotCreateThreads()
    {
        $this->withExceptionHandling();

        $this->post('/threads')
            ->assertLocation('/login');
    }

    /** @test */
    public function AnAuthenticateUserCanCreateNewForumThreads()
    {
        $this->be(factory(User::class)->create());
        $thread = factory(Thread::class)->make();

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)->assertSee($thread->body);
    }
}
