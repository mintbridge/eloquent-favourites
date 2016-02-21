<?php

namespace Mintbridge\EloquentFavourites;

interface FavouritableInterface
{
    public function favourites();

    public function getFavouriteableId();

    public function getFavouriteableType();
}
