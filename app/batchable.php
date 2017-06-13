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
     * Have the authenticated user favorite the model.
     *
     * @return void
     */
    public function batch()
    {
        $this->batches()->save(
            new Batch(['user_id' => auth()->id()])
        );
    }
}
