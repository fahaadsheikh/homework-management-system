<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Event;

class CreateEventsTest extends TestCase
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
	 * A user may create events
	 *
	 * @return void
	 * @author 
	 **/
	function test_an_authenticated_user_may_create_events()
	{
		$this->mockUser();

		$event   = factory('App\Event')->make();

		$this->post('/events', $event->toArray());

		$this->get('/events'.$event->id)
		    ->assertSee($event->body);
		
	}
	/**
	 * a_event_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_event_should_have_a_title()
	{

		$this->publishEvent(['title' => null])
			->assertSessionhasErrors('title');
	}

	/**
	 * a_event_should_have_a_title
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_event_should_have_a_body()
	{

		$this->publishEvent(['body' => null])
			->assertSessionhasErrors('body');
	}
	
	public function publishEvent($overrides = []) 
	{
		$this->mockUser();

		$event   = factory('App\Event')->make($overrides);

		return $this->post('/events', $event->toArray());
	}

}
