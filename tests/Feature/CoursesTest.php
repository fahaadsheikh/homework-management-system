<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use App\Course;

class CoursesTest extends TestCase
{

    use DatabaseMigrations;

    public function mockUser()
    {
        $user = User::first();
        $this->be($user);
    }

    public function setup()
    {
        parent::setup();
        $this->course = factory('App\Course')->create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_view_all_courses()
    {
        // Mock user authentication
        $this->mockUser();

        $this->get('/courses')
         ->assertSee($this->course->title);
    }

    public function test_a_user_can_view_single_course() 
    {
        // Mock user Authentification
        $this->mockUser();
        $this->get('/courses/' . $this->course->id)
         ->assertSee($this->course->title);
    }

    public function test_a_user_can_view_batches_within_the_associated_course() 
    {
        // Create a sample batch
        $batch = factory('App\Batch')->create(['course_id' => $this->course->id]);   
        
        // Mock user Authentification
        $this->mockUser();
        
        // Check if the created course is visited the created batch is shown
        $this->get('/courses/' . $this->course->id)
         ->assertSee($batch->title);
    }
}
