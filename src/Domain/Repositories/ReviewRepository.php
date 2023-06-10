<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Review;

interface ReviewRepository
{
    /**
     * Save a review
     */
    public function save(Review $review): Review;

    /**
     * Delete a review
     */
    public function delete(Review $review): bool;

    /**
     * Find a review by id
     */
    public function find(int $reviewId): ?Review;
}
