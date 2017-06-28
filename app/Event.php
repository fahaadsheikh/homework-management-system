<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $guarded = [];
	
    use batchable, creator;

    /*
	 * Return path of a single event
     */
    public function path() 
    {
        return 'events/' . $this->id;
    }

    /**
     * Add a course
     *
     * @return void
     * @author 
     **/

    public function addEvent($course)
    {
        $this->create($course);
    }
}
