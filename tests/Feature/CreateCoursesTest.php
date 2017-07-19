<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CreateCoursesTest extends TestCase
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

	public function publishCourse($overrides = []) 
	{
		$this->mockUser();

		$course   = factory('App\Course')->make($overrides);

		return $this->post('/courses', $course->toArray());
	}
}
