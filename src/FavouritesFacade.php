<?php

namespace Mintbridge\EloquentFavourites;

use Illuminate\Support\Facades\Facade;

class FavouritesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'favourites';
    }
}
