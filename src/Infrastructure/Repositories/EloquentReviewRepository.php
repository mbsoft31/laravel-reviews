<?php

namespace Mbsoft31\LaravelReviews\Infrastructure\Repositories;

use App\Domain\Entities\Review;
use App\Domain\Repositories\ReviewRepository;

class EloquentReviewRepository implements ReviewRepository
{
    /**
     * Save a review
     */
    public function save(Review $review): Review
    {
        $review->save();

        return $review;
    }

    /**
     * Delete a review
     */
    public function delete(Review $review): void
    {
        $review->delete();
    }

    /**
     * Find a review by id
     */
    public function find(int $reviewId): Review
    {
        // TODO: Implement find() method.
    }
}
