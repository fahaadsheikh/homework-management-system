<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CreateBatchesForCoursesTest extends TestCase
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
	 * a_batch_should_have_a_country
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_a_country()
	{
		$this->publishBatch(['country' => null])
			->assertSessionhasErrors('country');
	}

	/**
	 * a_batch_should_have_a_city
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_a_city()
	{
		$this->publishBatch(['city' => null])
			->assertSessionhasErrors('city');
	}

	/**
	 * a_batch_should_have_an_address
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_an_address()
	{
		$this->publishBatch(['address' => null])
			->assertSessionhasErrors('address');
	}

	/**
	 * a_batch_should_have_a_start_date
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_a_start_date()
	{
		$this->publishBatch(['start_date' => null])
			->assertSessionhasErrors('start_date');
	}

	/**
	 * a_batch_should_have_an_end_date
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_an_end_date()
	{
		$this->publishBatch(['end_date' => null])
			->assertSessionhasErrors('end_date');
	}

	/**
	 * a_batch_should_have_a_start_time
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_a_start_time()
	{
		$this->publishBatch(['start_time' => null])
			->assertSessionhasErrors('start_time');
	}

	/**
	 * a_batch_should_have_an_end_time
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_an_end_time()
	{
		$this->publishBatch(['end_time' => null])
			->assertSessionhasErrors('end_time');
	}

	/**
	 * a_batch_should_have_a_start_day
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_a_start_day()
	{
		$this->publishBatch(['start_day' => null])
			->assertSessionhasErrors('start_day');
	}

	/**
	 * a_batch_should_have_an_end_day
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_an_end_day()
	{
		$this->publishBatch(['end_day' => null])
			->assertSessionhasErrors('end_day');
	}

	/**
	 * a_batch_should_have_a_price
	 *
	 * @return void
	 * @author 
	 **/
	function test_a_batch_should_have_a_price()
	{
		$this->publishBatch(['price' => null])
			->assertSessionhasErrors('price');
	}

	public function publishBatch($overrides = []) 
	{
		$this->mockUser();

		$course   = factory('App\Course')->create();

		$batch = factory('App\Batch', 'course')->make($overrides);

		return $this->post('/courses/'.$course->id.'/batch', $batch->toArray());
		

	}

}
