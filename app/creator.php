<?php

namespace App;


trait creator
{

    /**
     * Fetch all batches for the parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
