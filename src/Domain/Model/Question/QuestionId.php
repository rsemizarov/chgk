<?php
declare(strict_types=1);

namespace App\Domain\Model\Question;

class QuestionId
{
    /**
     * @var string
     */
    private $id;

    /**
     * QuestionId constructor.
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
