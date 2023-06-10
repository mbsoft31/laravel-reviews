<?php

namespace Mbsoft31\LaravelReviews\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Mbsoft31\LaravelReviews\Models\Review;

/**
 * Trait HasReview
 *
 * @mixin Model
 */
trait HasReview
{

    /**
     * get model id
     */
    public function getReviewableId(): int
    {
        return $this->id;
    }

    /**
     * get model type
     */
    public function getReviewableType(): string
    {
        return get_class($this);
    }

    /**
     * get model reviews
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
