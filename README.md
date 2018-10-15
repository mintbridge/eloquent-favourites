# Eloquent Favourites

Laravel 5 package that allows users to favourite eloquent models.

## Installation

This package can be installed through Composer.
```bash
composer require mintbridge/eloquent-favourites
```

Once installed add the service provider and facade to your app config
```php
// config/app.php

'providers' => [
    '...',
    'Mintbridge\EloquentFavourites\FavouritesServiceProvider',
];

'aliases' => [
    '...',
    'Favourites' => 'Mintbridge\EloquentFavourites\FavouritesFacade',
];
```
Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

You'll also need to publish and run the migration in order to create the database table.
```
php artisan vendor:publish --provider="Mintbridge\EloquentFavourites\FavouritesServiceProvider" --tag="config"
php artisan vendor:publish --provider="Mintbridge\EloquentFavourites\FavouritesServiceProvider" --tag="migrations"
php artisan migrate
```

The configuration will be written to  ```config/eloquent-favourites.php```. The options have sensible defaults but you should change the user model to match the one used in your application.

## Usage

This package will allow your users to favourite models used in your application. To do so the models that you would like to favouritable must use the `Favouritable` trait and implement `FavouritableInterface`.

```php
use Mintbridge\EloquentFavourites\Favouritable;
use Mintbridge\EloquentFavourites\FavouritableInterface;

class Article extends Eloquent implements FavouritableInterface {

    use Favouritable;
    ...
}
```

Models can then be favourited, un-favourited or toggled using by using the `FavouritesManager` or more easily with the favourites facade:

```php
$article = Article::find(1);

// add article as a favourite
Favourites::add($article);

// remove article from by a favourite
Favourites::remove($article);

// toggle article as being a favourite
Favourites::toggle($article);
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

