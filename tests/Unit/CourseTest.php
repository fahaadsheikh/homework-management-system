<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CourseTest extends TestCase
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
        $user = $this->user;
        $this->be($user);
    }

    // A Course has an creator
    public function test_a_course_has_an_creator() {
        $this->assertInstanceOf('App\User', $this->course->creator);
    }

    // A Course can have batches
    public function test_a_course_has_batches() {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->course->batches);
    }

    /**
     * A course can add a batch
     *
     * @return void
     * @author 
     **/
    function test_a_course_can_add_a_batch()
    {
        // Make a sample batch for the current course in memory.
        $batch = [
                'user_id' => $this->user->id,
                'parent_id' => $this->course->id,
                'parent_type' => 'App\Course',
                'start_date' => date('Y-m-d'),
                'end_date' => date('Y-m-d'),
                'start_time' => date('Y-m-d'),
                'end_time' => date('Y-m-d'),
                'start_day' => date('Y-m-d'),
                'end_day' => date('Y-m-d'),
                'price' => 8000
            ];

        // Execute the storeCoruse function on the provided course so the batch is stored
        $this->course->addBatch($batch);


        // Check to see if the added batch is properly stored and shown in the course
        $this->assertCount(1, $this->course->batches);

    }
}
