<?php

use App\Domain\Entities\Review;
use App\Domain\Repositories\ReviewRepository;
use App\Domain\Services\ReviewService;

it('can test', function () {
    expect(true)->toBeTrue();
});

it(/**
 * @throws Exception
 */ /**
 * @throws Exception
 */ 'creates a review', function () {
    // Mock the ReviewRepository
    $repository = Mockery::mock(ReviewRepository::class);
    $repository->shouldReceive('save')->andReturnUsing(function (Review $review) {
        return $review;
    });

    // Create the ReviewService with the mocked repository
    $service = new ReviewService($repository);

    // Prepare the test data
    $data = [
        'rating' => 4,
        'comment' => 'Great product!',
    ];

    // Create the review
    $review = $service->createReview($data);

    // Assertions
    expect($review)->toBeInstanceOf(Review::class);
    expect($review->getRating()->getValue())->toBe($data['rating']);
    expect($review->getComment()->getValue())->toBe($data['comment']);
    // Add more assertions as needed
});

it(/**
 * @throws Exception
 */ 'updates a review', function () {
    // Mock the ReviewRepository
    $repository = Mockery::mock(ReviewRepository::class);
    $repository->shouldReceive('find')->andReturn(new Review());
    $repository->shouldReceive('save')->andReturnUsing(function (Review $review) {
        return $review;
    });

    // Create the ReviewService with the mocked repository
    $service = new ReviewService($repository);

    // Prepare the test data
    $reviewId = 1;
    $data = [
        'rating' => 5,
        'comment' => 'Updated review',
    ];

    // Update the review
    $review = $service->updateReview($reviewId, $data);

    // Assertions
    expect($review)->toBeInstanceOf(Review::class);
    expect($review->getId())->toBe($reviewId);
    expect($review->getRating()->getValue())->toBe($data['rating']);
    expect($review->getComment()->getValue())->toBe($data['comment']);
    // Add more assertions as needed
});

it(/**
 * @throws Exception
 */ 'deletes a review', function () {
    // Mock the ReviewRepository
    $repository = Mockery::mock(ReviewRepository::class);
    $repository->shouldReceive('find')->andReturn(new Review());
    $repository->shouldReceive('delete')->once();

    // Create the ReviewService with the mocked repository
    $service = new ReviewService($repository);

    // Prepare the test data
    $reviewId = 1;

    // Delete the review
    $service->deleteReview($reviewId);

    // No assertions needed as we are checking if the delete method is called
});

it(/**
 * @throws Exception
 */ 'gets all reviews', function () {
    // Mock the ReviewRepository
    $repository = Mockery::mock(ReviewRepository::class);
    $repository->shouldReceive('getAll')->andReturn([new Review(), new Review()]);

    // Create the ReviewService with the mocked repository
    $service = new ReviewService($repository);

    // Get all reviews
    $reviews = $service->getAllReviews();

    // Assertions
    expect($reviews)->toHaveCount(2);
    expect($reviews[0])->toBeInstanceOf(Review::class);
    expect($reviews[1])->toBeInstanceOf(Review::class);
    // Add more assertions as needed
});
