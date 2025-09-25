<?php

namespace Rpungello\Metabase;

use Rpungello\Metabase\Commands\MetabaseCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MetabaseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-metabase')
            ->hasConfigFile()
            ->hasMigration('create_metabase_table')
            ->hasCommand(MetabaseCommand::class);

        $this->app->singleton(Metabase::class, function ($app) {
            return new Metabase(
                config('metabase.base_uri'),
                config('metabase.api_key')
            );
        });
    }
}
