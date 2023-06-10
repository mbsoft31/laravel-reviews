<?php

namespace App\Domain\Services;

use App\Domain\Entities\Review;
use App\Domain\Repositories\ReviewRepository;
use App\Domain\ValueObjects\Comment;
use App\Domain\ValueObjects\Rating;

class ReviewService
{
    /**
     * Review repository instance to perform database operations
     */
    private ReviewRepository $reviewRepository;

    /**
     * ReviewService constructor.
     *
     * @param  ReviewRepository  $reviewRepository - review repository instance
     */
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Create a review and save it to the database
     *
     * @param  array  $data - data to create a review
     * @return Review - created review
     */
    public function createReview(array $data): Review
    {
        $review = new Review();
        $review->setRating(new Rating($data['rating']));
        $review->setComment(new Comment($data['comment']));
        // other attributes like user_id, reviewable_id and reviewable_type should be set here as well

        return $this->reviewRepository->save($review);
    }

    /**
     * Update a review and save it to the database
     *
     * @param  int  $reviewId - id of the review to update
     * @param  array  $data - data to update a review
     * @return Review - updated review
     */
    public function updateReview(int $reviewId, array $data): Review
    {
        $review = $this->reviewRepository->find($reviewId);
        $review->setRating(new Rating($data['rating']));
        $review->setComment(new Comment($data['comment']));
        // other attributes like user_id, reviewable_id and reviewable_type should be set here as well if they need to be updated

        return $this->reviewRepository->save($review);
    }

    /**
     * Delete a review from the database
     *
     * @param  int  $reviewId - id of the review to delete
     */
    public function deleteReview(int $reviewId): void
    {
        $review = $this->reviewRepository->find($reviewId);
        $this->reviewRepository->delete($review);
    }

    public function getAllReviews()
    {
        return $this->reviewRepository->getAll();
    }
}
