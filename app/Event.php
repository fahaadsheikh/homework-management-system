<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    /**
     * An Event could have many batches
     */
    public function batch()
    {
        return $this->hasMany('App\Batch');
    }
}
