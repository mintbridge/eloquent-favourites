<?php

namespace Mintbridge\EloquentFavourites;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Favourite extends Model
{
    const ATTR_ID                = 'id';
    const ATTR_FAVOURITABLE_ID   = 'favouritable_id';
    const ATTR_FAVOURITABLE_TYPE = 'favouritable_type';
    const ATTR_USER_ID           = 'user_id';
    const ATTR_CREATED_AT        = 'created_at';
    const ATTR_UPDATED_AT        = 'updated_at';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'favourites';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * Get the user that the perform the action.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(Config::get('eloquent-favourites.user'), self::ATTR_USER_ID);
    }

    /**
     * Get all of the owning favouritable models.
     */
    public function favouritable()
    {
        return $this->morphTo();
    }
}
