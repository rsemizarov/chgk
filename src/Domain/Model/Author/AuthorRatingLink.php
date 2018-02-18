<?php
declare(strict_types=1);

namespace App\Domain\Model\Author;

class AuthorRatingLink
{
    /**
     * @var AuthorId
     */
    private $authorId;
    /**
     * @var int
     */
    private $ratingId;

    /**
     * AuthorRatingLink constructor.
     * @param AuthorId $authorId
     * @param int $ratingId
     */
    public function __construct(AuthorId $authorId, int $ratingId)
    {
        $this->authorId = $authorId;
        $this->ratingId = $ratingId;
    }

    /**
     * @return AuthorId
     */
    public function getAuthorId(): AuthorId
    {
        return $this->authorId;
    }

    /**
     * @return int
     */
    public function getRatingId(): int
    {
        return $this->ratingId;
    }
}
