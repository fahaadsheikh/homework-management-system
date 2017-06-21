<?php

namespace App;

use App\Participant;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{

    use creator;
    // fillable fields
    protected $fillable = ['user_id'];


    /*
     * Return path of a single event
     */
    public function path() 
    {
        return 'batch/' . $this->id;
    }

    /**
     *
     * A Batch has many Participants
     *
     */

    public function participant() {
    	return $this->belongsToMany(Participant::class)->withTimestamps();
    }
    
}
