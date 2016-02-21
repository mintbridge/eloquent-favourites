<?php

namespace Mintbridge\EloquentFavourites;

interface FavouritableInterface
{
    public function favourites();

    public function getFavouritableId();

    public function getFavouritableType();
}
