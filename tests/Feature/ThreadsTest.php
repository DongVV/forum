<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function test_a_user_can_browse_thread()
    {
        $thread = factory(Thread::class)->create();
        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }
    /** @test */
    public function a_user_can_read_single_thread()
    {
        $thread = factory(Thread::class);
        $response = $this->get('/threads/'. $thread->id);
        $response->assertSee($thread->title);
    }
}
