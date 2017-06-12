<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	
    /**
     * A Course could have many batches
     */
/*    public function Batch()
    {
        return $this->hasMany('App\Batch');
        return $this->morphMany('App\Batch', 'parent_id');
    }*/

    /*
	 * Return path of a single course
     */

    public function path() {
    	return 'courses/' . $this->id;
    }
}
