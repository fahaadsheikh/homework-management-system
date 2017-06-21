<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class BatchTest extends TestCase
{
    use DatabaseMigrations;

    public function setup()
    {
        parent::setup();
        $this->user     = factory('App\User')->create();
        $this->course   = factory('App\Course')->create();
        $this->event   = factory('App\Event')->create();
        $this->batchforcourse    = factory('App\Batch', 'course')->create(['user_id' => $this->user->id, 'parent_id' => $this->course->id]);
        $this->batchforevent    = factory('App\Batch', 'event')->create(['user_id' => $this->user->id, 'parent_id' => $this->event->id]);

    }

    public function mockUser()
    {
        $user = User::first();
        $this->be($user);
    }

    // A Batch has an creator
    public function test_a_batch_has_an_creator() {
    	$this->assertInstanceOf('App\User', $this->batchforcourse->creator);
    }

    // A Batch can have participants
    public function test_a_batch_has_can_have_participants() {
        $this->assertInstanceOf('App\User', $this->batchforcourse->creator);
    }
}
