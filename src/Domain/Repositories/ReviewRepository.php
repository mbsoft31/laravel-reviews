<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Review;

interface ReviewRepository
{
    /**
     * Save a review
     * @param Review $review
     * @return Review
     */
    public function save(Review $review): Review;

    /**
     * Delete a review
     * @param Review $review
     */
    public function delete(Review $review): void;

    /**
     * Find a review by id
     * @param int $reviewId
     * @return Review
     */
    public function find(int $reviewId): Review;
}
