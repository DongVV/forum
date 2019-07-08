<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInFormTest extends TestCase
{
    use DatabaseMigrations;

    public function unAuthenticatedUsersMayNotAddReply()
    {
        $this->expectException(AuthenticationException::class);

        $this->post('/threads/1/replies', []);
    }

    /** @test */
    public function AnAuthenticatedUserMayParticipateInForumThreads()
    {
        $this->signIn();

        $thread = create(Thread::class);
        $reply = make(Reply::class);

        $this->post($thread->path(). '/replies', $reply->toArray());
        $this->get($thread->path())->assertSee($reply->body);
    }
}
