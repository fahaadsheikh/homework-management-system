<?php

namespace App;


trait batchable
{

    /**
     * Fetch all batches for the parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function batches()
    {
        return $this->morphMany(Batch::class, 'parent');
    }
    /**
     * Scope a query to records Batched by the given user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  User                                  $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBatchedBy($query, User $user)
    {
        return $query->whereHas('batches', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }
    /**
     * Determine if the model is Batched by the given user.
     *
     * @param  User $user
     * @return boolean
     */
    public function isBatchedBy(User $user)
    {
        return $this->batches()
            ->where('user_id', $user->id)
            ->exists();
    }

    /**
     * A Batch can be created by its parents
     *
     * @return void
     * @author 
     **/
    function addBatch($batch)
    {
        $this->batches()->create($batch);
    }
}
