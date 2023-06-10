<?php

namespace App\Domain\Factories;

use App\Domain\Entities\Review;
use App\Domain\ValueObjects\Comment;
use App\Domain\ValueObjects\Rating;

class ReviewFactory
{
    /**
     * Create a Review object from an array of data
     *
     * @param array $data - data to create a review
     * @return Review - created review
     */
    public static function createFromArray(array $data): Review
    {
        $review = new Review();

        if (isset($data['id'])) {
            $review->setId($data['id']);
        }

        $rating = $data['rating'] ?? 0;
        $comment = $data['comment'] ?? '';

        $review->setRating(new Rating($rating));
        $review->setComment(new Comment($comment));

        // Set other properties like user_id, reviewable_id, and reviewable_type if necessary
        $review->setUserId($data['user_id']);
        $review->setReviewableId($data['reviewable_id']);
        $review->setReviewableType($data['reviewable_type']);

        return $review;
    }
}
