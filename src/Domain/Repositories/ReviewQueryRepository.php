<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Review;

interface ReviewQueryRepository
{
    /**
     * Get all reviews
     *
     * @return array|Review[]
     */
    public function getAll(): array;

    /**
     * Get reviews by reviewable ID and type
     *
     * @return array|Review[]
     */
    public function getReviewByReviewableIdAndReviewableType(int $reviewableId, string $reviewableType): array;

    /**
     * Get reviews by user ID
     *
     * @return array|Review[]
     */
    public function getReviewByUserId(int $userId): array;
}
