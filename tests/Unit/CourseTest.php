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
        $this->batchforcourse    = factory('App\Batch', 'course')->create(['user_id' => $this->user->id, 'parent_id' => $this->course->id]);
        $this->batchforevent    = factory('App\Batch', 'event')->create(['user_id' => $this->user->id, 'parent_id' => $this->event->id]);

    }

    public function mockUser()
    {
        $user = User::first();
        $this->be($user);
    }

    // A Course has an creator
    public function test_a_course_has_an_creator() {
        $this->assertInstanceOf('App\User', $this->course->creator);
    }

}
