<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Activity Model
    |--------------------------------------------------------------------------
    |
    | The model to be used for storing favourites
    |
    */
    'model' => Mintbridge\EloquentFavourites\Favourite::class,

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | The user model to associate with the favourite, defaults to the app
    | user model
    |
    */
    'user' => App\User::class,

];
