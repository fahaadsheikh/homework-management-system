<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    public function setup()
    {
        parent::setup();
        $this->user     = factory('App\User')->create();
        $this->course   = factory('App\Course')->create();
        $this->event   = factory('App\Event')->create();
        $this->batchforcourse    = factory('App\Batch', 'course')->make(['user_id' => $this->user->id, 'parent_id' => $this->course->id]);
        $this->batchforevent    = factory('App\Batch', 'event')->make(['user_id' => $this->user->id, 'parent_id' => $this->event->id]);

    }

    public function mockUser()
    {
        $user = User::first();
        $this->be($user);
    }

    // An Event has an creator
    public function test_an_event_has_an_creator() {
    	$this->assertInstanceOf('App\User', $this->event->creator);
    }

    // An Event can have batches
    public function test_an_event_has_batches() {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->event->batches);
    }

    /**
     * A event can add a batch
     *
     * @return void
     * @author 
     **/
    function test_a_event_can_add_a_batch()
    {
        $batch = factory('App\Batch', 'event')->raw();

        // Execute the storeCoruse function on the provided event so the batch is stored
        $this->event->addBatch($batch);

        // Check to see if the added batch is properly stored and shown in the event
        $this->assertCount(1, $this->event->batches);

    }
}
