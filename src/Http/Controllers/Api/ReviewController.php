<?php

namespace Mbsoft31\LaravelReviews\Http\Controllers\Api;

use App\Domain\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Mbsoft31\LaravelReviews\Http\Requests\ReviewStoreRequest;
use Mbsoft31\LaravelReviews\Http\Requests\ReviewUpdateRequest;

class ReviewController
{
    private ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * Display a listing of the reviews.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $reviews = $this->reviewService->getAllReviews();

        return response()->json($reviews);
    }

    /**
     * Store a newly created review in storage.
     *
     * @param  ReviewStoreRequest  $request
     * @return JsonResponse
     */
    public function store(ReviewStoreRequest $request)
    {
        $review = $this->reviewService->createReview($request->validated());

        return response()->json($review, 201);
    }

    /**
     * Display the specified review.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $review = $this->reviewService->getReviewById($id);

        return response()->json($review);
    }

    /**
     * Update the specified review in storage.
     *
     * @param  ReviewUpdateRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ReviewUpdateRequest $request, int $id)
    {
        $review = $this->reviewService->updateReview($id, $request->validated());

        return response()->json($review);
    }

    /**
     * Remove the specified review from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $this->reviewService->deleteReview($id);

        return response()->json(null, 204);
    }
}
