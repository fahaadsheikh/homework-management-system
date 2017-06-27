<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CreateTest extends TestCase
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

	/**
	 * A user may create courses
	 *
	 * @return void
	 * @author 
	 **/
	function test_an_authenticated_user_may_create_batches_for_courses()
	{
		$this->mockUser();

		$this->post('/courses/'.$this->course->id.'/batch', $this->batchforcourse->toArray());

		$this->course->addBatch([
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
		]);

		$this->get('/courses/'.$this->course->id.'/batch')
		 ->assertSee("$this->batchforcourse->id");
		
	}
}
