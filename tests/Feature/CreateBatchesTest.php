<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CreateBatchesTest extends TestCase
{
	use DatabaseMigrations;

	public function setup()
	{
	    parent::setup();
	    $this->user     = factory('App\User')->create();

	}

	public function mockUser()
	{
	    $user = User::first();
	    $this->be($user);
	}



	/**
	 * A user may create batches for courses
	 *
	 * @return void
	 * @author 
	 **/
	function test_an_authenticated_user_may_create_batches_for_courses()
	{
		$this->mockUser();

		$this->course   = factory('App\Course')->create();

		$this->batch   = factory('App\Batch', 'course')->make(['user_id' => $this->user->id, 'parent_id' => $this->course->id]);

		$this->post('/courses/'.$this->course->id.'/batch', $this->batch->toArray());
		
		// Check to see if the added batch is properly stored and shown in the course
	    $this->assertCount(1, $this->course->batches);

		$this->get('/courses/'.$this->course->id)
		 ->assertSee($this->batch->start_day);		
	}

		/**
		 * A user may create batches for courses
		 *
		 * @return void
		 * @author 
		 **/
		function test_an_authenticated_user_may_create_batches_for_events()
		{
			$this->mockUser();

			$this->event   = factory('App\Event')->create();

			$this->batch   = factory('App\Batch', 'event')->make(['user_id' => $this->user->id, 'parent_id' => $this->event->id]);

			$this->post('/events/'.$this->event->id.'/batch', $this->batch->toArray());
			
			// Check to see if the added batch is properly stored and shown in the event
	        $this->assertCount(1, $this->event->batches);

			$this->get('/events/'.$this->event->id)
			 ->assertSee($this->batch->start_day);		
		}

}
