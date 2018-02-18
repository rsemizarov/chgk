<?php
declare(strict_types=1);

namespace App\Domain\Model\Author;

class DisplayedAuthors extends \ArrayIterator
{
    /**
     * @var string
     */
    private $text;

    public function __construct(array $authors, string $text)
    {
        parent::__construct($authors);
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
