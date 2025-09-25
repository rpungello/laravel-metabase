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
            ->hasViews()
            ->hasMigration('create_laravel_metabase_table')
            ->hasCommand(MetabaseCommand::class);
    }
}
