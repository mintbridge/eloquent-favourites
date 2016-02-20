<?php

namespace Mintbridge\EloquentFavourites;

use Auditor;
use Config;

trait Favouritable
{
    /**
     * Get all of the activities performed on the model
     */
    public function favourites()
    {
        return $this->morphMany(Config::get('eloquent-favourites.model'), 'favouritable');
    }
}
