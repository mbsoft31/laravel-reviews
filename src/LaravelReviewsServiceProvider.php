<?php

namespace Mbsoft31\LaravelReviews;

use App\Domain\Repositories\ReviewRepository;
use App\Domain\Services\ReviewService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Mbsoft31\LaravelReviews\Commands\LaravelReviewsCommand;
use Mbsoft31\LaravelReviews\Infrastructure\Repositories\EloquentReviewRepository;
use Spatie\LaravelPackageTools\Exceptions\InvalidPackage;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelReviewsServiceProvider extends PackageServiceProvider
{
    /**
     * @throws InvalidPackage
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->bind('laravel-reviews', function () {
            return new LaravelReviews;
        });

        $this->app->bind(ReviewRepository::class, EloquentReviewRepository::class);

        $this->app->instance(ReviewService::class, new ReviewService(
            $this->app->make(ReviewRepository::class)
        ));

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
