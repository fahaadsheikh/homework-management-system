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
	 * a_participant_should_have_a_first_name
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_participant_should_have_a_first_name()
	{

		$this->publishParticipant(['first_name' => null])
			->assertSessionhasErrors('first_name');
	}

	/**
	 * a_participant_should_have_a_last_name
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_participant_should_have_a_last_name()
	{

		$this->publishParticipant(['last_name' => null])
			->assertSessionhasErrors('last_name');
	}

	/**
	 * a_participant_should_have_an_email
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_participant_should_have_an_email()
	{

		$this->publishParticipant(['email' => null])
			->assertSessionhasErrors('email');
	}

	/**
	 * a_participant_should_have_a_city
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_participant_should_have_a_country()
	{

		$this->publishParticipant(['country' => null])
			->assertSessionhasErrors('country');
	}

	/**
	 * a_participant_should_have_a_city
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_participant_should_have_a_city()
	{

		$this->publishParticipant(['city' => null])
			->assertSessionhasErrors('city');
	}

	/**
	 * a_participant_should_have_an_address
	 *
	 * @return void
	 * @author 
	 **/
	public function test_a_participant_should_have_an_address()
	{

		$this->publishParticipant(['address' => null])
			->assertSessionhasErrors('address');
	}


	public function publishParticipant($overrides = []) 
	{
		$this->mockUser();

		$participant   = factory('App\Participant')->make($overrides);

		return $this->post('/participants', $participant->toArray());
	}

}
