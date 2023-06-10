<?php

namespace Mbsoft31\LaravelReviews\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mbsoft31\LaravelReviews\LaravelReviews
 */
class LaravelReviews extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-reviews';
    }
}
