<?php

namespace App\Domain\Services;

use App\Domain\Entities\Review;
use App\Domain\Repositories\ReviewRepository;
use App\Domain\ValueObjects\Comment;
use App\Domain\ValueObjects\Rating;
use Exception;
use Illuminate\Support\Facades\Log;

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
     *
     * @throws Exception
     */
    public function createReview(array $data): Review
    {
        try {
            $review = new Review();
            $review->setRating(new Rating($data['rating']));
            $review->setComment(new Comment($data['comment']));
            // Set other attributes

            return $this->reviewRepository->save($review);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e->getMessage());
            // Provide a user-friendly error message
            // Take necessary fallback actions
            throw $e; // Rethrow the exception or handle it accordingly
        }
    }

    /**
     * Update a review and save it to the database
     *
     * @param  int  $reviewId - id of the review to update
     * @param  array  $data - data to update a review
     * @return Review - updated review
     *
     * @throws Exception
     */
    public function updateReview(int $reviewId, array $data): Review
    {
        try {
            $review = $this->reviewRepository->find($reviewId);
            if ($review === null) {
                throw new \Exception('Review not found');
            }
            $review->setRating(new Rating($data['rating']));
            $review->setComment(new Comment($data['comment']));
            // Update other attributes

            return $this->reviewRepository->save($review);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e->getMessage());
            // Provide a user-friendly error message
            // Take necessary fallback actions
            throw $e; // Rethrow the exception or handle it accordingly
        }
    }

    /**
     * Delete a review from the database
     *
     * @param  int  $reviewId - id of the review to delete
     *
     * @throws Exception
     */
    public function deleteReview(int $reviewId): void
    {
        try {
            $review = $this->reviewRepository->find($reviewId);
            if ($review === null) {
                throw new \Exception('Review not found');
            }
            $this->reviewRepository->delete($review);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e->getMessage());
            // Provide a user-friendly error message
            // Take necessary fallback actions
            throw $e; // Rethrow the exception or handle it accordingly
        }
    }

    /**
     * @throws Exception
     */
    public function getAllReviews(): array
    {
        try {
            return $this->reviewRepository->getAll();
        } catch (Exception $e) {
            // Log the error
            Log::error($e->getMessage());
            // Provide a user-friendly error message
            // Take necessary fallback actions
            throw $e; // Rethrow the exception or handle it accordingly
        }
    }
}
