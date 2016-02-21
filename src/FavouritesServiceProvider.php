<?php

namespace Mintbridge\EloquentFavourites;

use Illuminate\Support\ServiceProvider;
use Mintbridge\EloquentFavourites\FavouritesManager;

class FavouritesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the config and migrations.
     */
    public function boot()
    {
        // Publish a config file
        $this->publishes([
            __DIR__.'/config/eloquent-favourites.php' => config_path('eloquent-favourites.php'),
        ], 'config');

        // Publish migrations
        $this->publishes([
            __DIR__.'/migrations/create_favourites_table.php.stub' => base_path(
                '/database/migrations/'.date('Y_m_d_His', time()).'_create_favourites_table.php'
            ),
        ], 'migrations');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('favourites', function($app) {
            return new FavouritesManager();
        });

        $this->app->alias('favourites', FavouritesManager::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'favourites'
        ];
    }
}
