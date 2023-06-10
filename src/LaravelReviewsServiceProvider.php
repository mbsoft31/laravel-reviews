<?php

namespace Mbsoft31\LaravelReviews;

use App\Domain\Repositories\ReviewRepository;
use Mbsoft31\LaravelReviews\Infrastructure\Repositories\EloquentReviewRepository;
use Spatie\LaravelPackageTools\Exceptions\InvalidPackage;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mbsoft31\LaravelReviews\Commands\LaravelReviewsCommand;

class LaravelReviewsServiceProvider extends PackageServiceProvider
{

    /**
     * @throws InvalidPackage
     */
    public function register()
    {
        $this->app->bind('laravel-reviews', function () {
            return new LaravelReviews;
        });

        $this->app->bind(ReviewRepository::class, EloquentReviewRepository::class);

        return parent::register();
    }

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
