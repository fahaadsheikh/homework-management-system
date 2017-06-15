<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use batchable;

    /*
	 * Return path of a single event
     */
    public function path() 
    {
        return 'courses/' . $this->id;
    }
}
