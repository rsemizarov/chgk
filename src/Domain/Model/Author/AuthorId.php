<?php
declare(strict_types=1);

namespace App\Domain\Model\Author;

class AuthorId
{
    /**
     * @var string
     */
    private $id;

    /**
     * AuthorId constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
