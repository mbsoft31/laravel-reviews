<?php

namespace App\Domain\ValueObjects;

class Comment
{
    /**
     * Comment
     */
    private string $comment;

    /**
     * Comment constructor.
     */
    public function __construct(string $comment)
    {
        if (empty($comment)) {
            throw new \InvalidArgumentException('Comment cannot be empty');
        }

        $this->comment = $comment;
    }

    /**
     * Get comment
     */
    public function getValue(): string
    {
        return $this->comment;
    }
}
