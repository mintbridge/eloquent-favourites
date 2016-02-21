<?php

namespace Mintbridge\EloquentFavourites;

use Config;

trait Favouritable
{
    /**
     * Specify the favourites relationship between the models
     */
    public function favourites()
    {
        return $this->morphMany(Config::get('eloquent-favourites.model'), 'favouritable');
    }

    /**
     * Get the favouritable id for the model
     */
    public function getFavouriteableId()
    {
        return $this->id;
    }

    /**
     * Get the favouritable type for the model
     */
    public function getFavouriteableType()
    {
        return get_class($this);
    }
}
