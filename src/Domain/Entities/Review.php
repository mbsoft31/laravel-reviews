<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Comment;
use App\Domain\ValueObjects\Rating;

class Review
{
    private int $id;

    private Rating $rating;

    private Comment $comment;

    private int $user_id;

    private int $reviewable_id;

    private string $reviewable_type;

    public function __construct()
    {
        $this->rating = new Rating(0);
        $this->comment = new Comment('');
        $this->user_id = 0;
        $this->reviewable_id = 0;
        $this->reviewable_type = null;
    }

    public function setRating(Rating $param): void
    {
        $this->rating = $param;
    }

    public function setComment(Comment $param): void
    {
        $this->comment = $param;
    }

    /**
     * @return Rating - Rating object
     */
    public function getRating(): Rating
    {
        return $this->rating;
    }

    /**
     * @return Comment - Comment object
     */
    public function getComment(): Comment
    {
        return $this->comment;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getReviewableId(): int
    {
        return $this->reviewable_id;
    }

    public function getReviewableType(): string
    {
        return $this->reviewable_type;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setReviewableId(int $reviewable_id): void
    {
        $this->reviewable_id = $reviewable_id;
    }

    public function setReviewableType(string $reviewable_type): void
    {
        $this->reviewable_type = $reviewable_type;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
