<?php

namespace Mbsoft31\LaravelReviews\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Mbsoft31\LaravelReviews\Models\Review;

/**
 * Trait HasReview
 * @mixin Model
 * @package Mbsoft31\LaravelReviews\Traits
 */
trait HasReview
{
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

}
