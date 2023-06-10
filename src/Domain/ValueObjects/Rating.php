<?php

namespace App\Domain\ValueObjects;

class Rating
{
    /**
     * Rating
     */
    private int $rating;

    public function __construct(int $rating)
    {
        // rating must be between 1 and 5
        if ($rating < 1 || $rating > 5) {
            throw new \InvalidArgumentException('Rating must be between 1 and 5');
        }

        // other validation rules can be added here

        $this->rating = $rating;
    }

    /**
     * Get rating value
     */
    public function getValue(): int
    {
        return $this->rating;
    }
}
