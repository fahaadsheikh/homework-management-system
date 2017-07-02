<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CreateParticipantsTest extends TestCase
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
	 * A user may create participants
	 *
	 * @return void
	 * @author 
	 **/
	function test_an_authenticated_user_may_create_partcipants()
	{
		$this->mockUser();

		$participants   = factory('App\Participant')->make();

		$this->post('/participants', $participants->toArray());

		$this->get('/participants'.$participants->id)
		    ->assertSee($participants->first_name);
		
	}

	/**
	 * a_course_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_course_should_have_a_title()
	{

		$this->publishCourse(['title' => null])
			->assertSessionhasErrors('title');
	}

	/**
	 * a_course_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_course_should_have_a_body()
	{

		$this->publishCourse(['body' => null])
			->assertSessionhasErrors('body');
	}

	/**
	 * a_course_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_course_should_have_a_country()
	{

		$this->publishCourse(['country' => null])
			->assertSessionhasErrors('country');
	}

	/**
	 * a_course_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_course_should_have_a_city()
	{

		$this->publishCourse(['city' => null])
			->assertSessionhasErrors('city');
	}

	/**
	 * a_course_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_course_should_have_a_address()
	{

		$this->publishCourse(['address' => null])
			->assertSessionhasErrors('address');
	}


	public function publishCourse($overrides = []) 
	{
		$this->mockUser();

		$course   = factory('App\Course')->make($overrides);

		return $this->post('/courses', $course->toArray());
	}

}
