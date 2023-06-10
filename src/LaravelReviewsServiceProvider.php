<?php

namespace Mbsoft31\LaravelReviews;

use Mbsoft31\LaravelReviews\Commands\LaravelReviewsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelReviewsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-reviews')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_reviews_table')
            ->hasCommand(LaravelReviewsCommand::class);
    }
}
