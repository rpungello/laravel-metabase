# Metabase integration for Laravel apps

[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rpungello/laravel-metabase/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rpungello/laravel-metabase/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rpungello/laravel-metabase/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rpungello/laravel-metabase/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require rpungello/laravel-metabase
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="metabase-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="metabase-config"
```

This is the contents of the published config file:

```php
return [
    'base_uri' => env('METABASE_BASE_URI'),
    'api_key' => env('METABASE_API_KEY'),
    'db_uri' => env('METABASE_DB_URI'),
    'model_class' => \Rpungello\Metabase\Models\Database::class,
];
```

## Usage

```php
\Rpungello\Metabase\Facades\Metabase::getDatabase(1);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rob Pungello](https://github.com/rpungello)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
