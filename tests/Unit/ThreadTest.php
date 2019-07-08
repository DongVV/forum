<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    protected $thread;

    public function setUp():void
    {
        parent::setUp();

        $this->thread = create(Thread::class);
    }

    /** @test */
    public function aThreadHasReplies()
    {
        $this->assertInstanceOf(Collection::class, $this->thread->replies);
    }

    /** @test */
    public function aThreadACreator()
    {
        $this->assertInstanceOf(User::class, $this->thread->creator);
    }

    /** @test */
    public function AThreadCanAddReply()
    {
        $this->thread->addReply([
            'body' => 'test',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
