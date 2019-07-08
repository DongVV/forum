<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function itHasAnOwner()
    {
        $reply = create(Reply::class);
        $this->assertInstanceOf(User::class, $reply->owner);
    }
}
