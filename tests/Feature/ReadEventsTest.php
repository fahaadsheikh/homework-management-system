<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use App\Event;

class ReadEventsTest extends TestCase
{

    use DatabaseMigrations;

    public function setup()
    {
        parent::setup();
        $this->user     = factory('App\User')->create();
        $this->event   = factory('App\Event')->create();
        $this->batch    = factory('App\Batch', 'event')->create(['user_id' => $this->user->id, 'parent_id' => $this->event->id, 'parent_type' => 'App\Event']);
    }

    public function mockUser()
    {
        $user = User::first();
        $this->be($user);
    }

    /**
     * TODO Comment
     *
     * @return void
     */
    public function test_a_user_can_view_all_events()
    {
        // Mock user authentication
        $this->mockUser();

        $this->get('/events')
         ->assertSee($this->event->title);
    }


    /**
     * TODO Comment
     *
     * @return void
     */
    public function test_a_user_can_view_single_event() 
    {
        // Mock user Authentification
        $this->mockUser();

        $this->get('/events/' . $this->event->id)
         ->assertSee($this->event->title);
    }


    /**
     * TODO Comment
     *
     * @return void
     */
    public function test_a_user_can_view_batches_within_the_associated_event() 
    {
        // Mock user Authentification
        $this->mockUser();

        $batch_id = $this->batch->id;
                
        // Check if the created event is visited the created batch is shown
        $this->get('/events/' . $this->event->id)
         ->assertSee("$batch_id");
    }
}
