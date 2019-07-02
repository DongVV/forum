<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function aUserCanBrowseThread()
    {
        $this->get('/threads')->assertSee($this->thread->title);
    }

    /** @test */
    public function aUserCanReadSingleThread()
    {
        $this->get($this->thread->path())->assertSee($this->thread->title);
    }

    /** @test */
    public function aUserCanReadRepliesThatAreAssociatedWithAThread()
    {
        $reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);
        $this->get($this->thread->path())->assertSee($reply->body);
    }
}
