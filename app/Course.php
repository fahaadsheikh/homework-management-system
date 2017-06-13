<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	
    use batchable;

    /*
	 * Return path of a single course
     */

    public function path() {
    	return 'courses/' . $this->id;
    }
}
