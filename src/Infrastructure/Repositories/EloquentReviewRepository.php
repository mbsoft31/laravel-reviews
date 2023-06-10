<?php

namespace Mbsoft31\LaravelReviews\Infrastructure\Repositories;

use App\Domain\Entities\Review;
use App\Domain\Factories\ReviewFactory;
use App\Domain\Repositories\ReviewQueryRepository;
use App\Domain\Repositories\ReviewRepository;
use Mbsoft31\LaravelReviews\Models\Review as ReviewModel;

class EloquentReviewRepository implements ReviewRepository, ReviewQueryRepository
{
    /**
     * Save a review
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
        } else {
            $reviewModel = ReviewModel::fromRatingEntity($review);
            $reviewModel->save();
            $review->setId($reviewModel->id);
        }

        return $review;
    }

    /**
     * Delete a review
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
     */
    public function find(int $reviewId): ?Review
    {
        $review =
            ReviewModel::where('id', $reviewId)
                ->first();

        if (! $review) {
            //throw new \Exception('Review not found');
            return null;
        }

        return ReviewFactory::createFromArray($review->toArray());
    }

    /**
     * @return array|Review[]
     */
    public function getAll(): array
    {
        $allReviews = ReviewModel::all();

        return $allReviews->map(function ($review) {
            return ReviewFactory::createFromArray($review->toArray());
        })->toArray();
    }

    public function getReviewByReviewableIdAndReviewableType($reviewableId, $reviewableType): array
    {
        $reviewModels =
            ReviewModel::where('reviewable_id', $reviewableId)
                ->where('reviewable_type', $reviewableType)
                ->get();

        return $reviewModels->map(function ($review) {
            return ReviewFactory::createFromArray($review->toArray());
        })->toArray();
    }

    public function getReviewByUserId($userId): array
    {
        $reviewModels =
            ReviewModel::where('user_id', $userId)
                ->get();

        return $reviewModels->map(function ($review) {
            return ReviewFactory::createFromArray($review->toArray());
        })->toArray();
    }
}
