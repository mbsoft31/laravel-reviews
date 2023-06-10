<?php

namespace App\Domain\ValueObjects;

class Comment
{
    /**
     * Comment
     * @var string
     */
    private string $comment;

    /**
     * Comment constructor.
     * @param string $comment
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
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }
}
