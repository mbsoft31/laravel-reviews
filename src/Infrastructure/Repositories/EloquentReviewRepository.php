<?php

namespace Mbsoft31\LaravelReviews\Infrastructure\Repositories;

use App\Domain\Entities\Review;
use App\Domain\Repositories\ReviewRepository;
use Mbsoft31\LaravelReviews\Models\Review as ReviewModel;

class EloquentReviewRepository implements ReviewRepository
{

    /**
     * Save a review
     * @param Review $review
     * @return Review
     */
    public function save(Review $review): Review
    {
        $reviewModel = ReviewModel::find($review->getId());

        if ($reviewModel) {
            $reviewModel->update([
                'rating' => $review->getRating()->getValue(),
                'comment' => $review->getComment()->getValue(),
                'user_id' => $review->getUserId(),
                'reviewable_id' => $review->getReviewableId(),
                'reviewable_type' => $review->getReviewableType(),
            ]);
        }else {
            $reviewModel = ReviewModel::fromRatingEntity($review);
            $reviewModel->save();
            $review->setId($reviewModel->id);
        }
        return $review;
    }

    /**
     * Delete a review
     * @param Review $review
     * @return bool
     */
    public function delete(Review $review): bool
    {
        $reviewModel = ReviewModel::find($review->getId());

        if ($reviewModel) {
            $reviewModel->delete();
            return true;
        }

        return false;
    }

    /**
     * Find a review by id
     * @param int $reviewId
     * @return Review|null
     */
    public function find(int $reviewId): ?Review
    {
        $review =
            ReviewModel::where('id', $reviewId)
                ->first();

        if (!$review) {
            //throw new \Exception('Review not found');
            return null;
        }

        return Review::fromArray($review->toArray());
    }

    /**
     * @return array|Review[]
     */
    public function getAll(): array
    {
        $allReviews = ReviewModel::all();

        return $allReviews->map(function ($review) {
            return Review::fromArray($review->toArray());
        })->toArray();
    }

    public function getReviewByReviewableIdAndReviewableType($reviewableId, $reviewableType)
    {
        $reviewModels =
            ReviewModel::where('reviewable_id', $reviewableId)
            ->where('reviewable_type', $reviewableType)
            ->get();

        return $reviewModels->map(function ($review) {
            return Review::fromArray($review->toArray());
        })->toArray();
    }

    public function getReviewByUserId($userId)
    {
        $reviewModels =
            ReviewModel::where('user_id', $userId)
                ->get();

        return $reviewModels->map(function ($review) {
            return Review::fromArray($review->toArray());
        })->toArray();
    }
}
