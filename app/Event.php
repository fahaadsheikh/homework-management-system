<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use batchable, creator;

    /*
	 * Return path of a single event
     */
    public function path() 
    {
        return 'events/' . $this->id;
    }
}
