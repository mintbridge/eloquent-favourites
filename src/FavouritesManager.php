<?php

namespace Mintbridge\EloquentFavourites;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Mintbridge\EloquentFavourites\Activity;
use Mintbridge\EloquentFavourites\FavouritableInterface;

class FavouritesManager
{
    /**
     * Toggle the favourite on the given model for the user (if any)
     *
     * @param \Mintbridge\EloquentFavourites\FavouritableInterface $model
     */
    public function toggle(FavouritableInterface $model)
    {
        $user = Auth::user();

        $method = (($this->exists($model, $user)) ? 'remove' : 'add');

        return $this->{$method}($model, $user);
    }

    /**
     * Add the favourite to the given model for the user (if any)
     *
     * @param \Mintbridge\EloquentFavourites\FavouritableInterface $model
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     */
    public function add(FavouritableInterface $model, Authenticatable $user)
    {
        $favourite = new Favourite();

        if ($user) {
            $favourite->user()->associate($user);
        }

        return $model->favourites()->save($favourite);
    }

    /**
     * Remove the favourite from the given model for the user (if any)
     *
     * @param \Mintbridge\EloquentFavourites\FavouritableInterface $model
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     */
    public function remove(FavouritableInterface $model, Authenticatable $user)
    {
        $query = $this->query($model, $user);

        return $query->delete();
    }

    /**
     * Check if the favourite is on the given model for the user (if any)
     *
     * @param \Mintbridge\EloquentFavourites\FavouritableInterface $model
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     */
    private function exists(FavouritableInterface $model, Authenticatable $user)
    {
        $query = $this->query($model, $user);

        return $query->exists();
    }

    /**
     * Create the query for the favourite, modal and user
     *
     * @param \Mintbridge\EloquentFavourites\FavouritableInterface $model
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     */
    private function query(FavouritableInterface $model, Authenticatable $user)
    {
        $query = Favourite::where(Favourite::ATTR_FAVOURITABLE_ID, '=', $model->id)
            ->where(Favourite::ATTR_FAVOURITABLE_TYPE, '=', get_class($model))
            ->where(Favourite::ATTR_USER_ID, '=', $user->id);

        return $query;
    }
}
