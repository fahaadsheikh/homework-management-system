<?php

namespace App;

use App\Participant;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    // fillable fields
    protected $fillable = ['user_id'];

    /**
     *
     * A Batch has many Participants
     *
     */

    public function participant() {
    	return $this->belongsToMany(Participant::class)->withTimestamps();
    }
    
}
