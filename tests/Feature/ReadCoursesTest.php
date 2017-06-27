<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use App\Course;

class ReadCoursesTest extends TestCase
{

    use DatabaseMigrations;

    protected $course;

    public function setup()
    {
        parent::setup();
        $this->user     = factory('App\User')->create();
        $this->course   = factory('App\Course')->create();
        $this->batch    = factory('App\Batch', 'course')->create(['user_id' => $this->user->id, 'parent_id' => $this->course->id, 'parent_type' => 'App\Course']);
    }

    public function mockUser()
    {
        $user = User::first();
        $this->be($user);
    }


    /**
     * TODO Comment
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

    /**
     * TODO Comment
     *
     * @return void
     */    
    public function test_a_user_can_view_single_course() 
    {
        // Mock user Authentification
        $this->mockUser();

        $this->get('/courses/' . $this->course->id)
         ->assertSee($this->course->title);
    }

    /**
     * TODO Comment
     *
     * @return void
     */
/*    public function test_a_user_can_view_batches_within_the_associated_course() 
    {
        // Mock user Authentification
        $this->mockUser();

        $batch_id = $this->batch->id;
                
        // Check if the created course is visited the created batch is shown
        $this->get('/courses/' . $this->course->id)
         ->assertSee("$batch_id");
    }*/

}
