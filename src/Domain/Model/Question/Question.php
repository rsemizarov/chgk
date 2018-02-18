<?php
declare(strict_types=1);

namespace App\Domain\Model\Question;

use App\Domain\Model\Author\DisplayedAuthors;
use App\Domain\Model\Source\SourceCollection;

class Question
{
    /**
     * @var string
     */
    private $question;
    /**
     * @var string
     */
    private $answer;
    /**
     * @var string
     */
    private $comments;
    /**
     * @var string
     */
    private $passCriteria;
    /**
     * @var SourceCollection
     */
    private $sources;
    /**
     * @var DisplayedAuthors
     */
    private $authors;
    /**
     * @var QuestionId
     */
    private $id;

    /**
     * Question constructor.
     * @param QuestionId $id
     * @param string $question
     * @param string $answer
     * @param string $comments
     * @param string $passCriteria
     * @param SourceCollection $sources
     * @param DisplayedAuthors $authors
     */
    public function __construct(QuestionId $id, string $question, string $answer, string $comments, string $passCriteria, SourceCollection $sources, DisplayedAuthors $authors)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->comments = $comments;
        $this->passCriteria = $passCriteria;
        $this->sources = $sources;
        $this->authors = $authors;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @return string
     */
    public function getPassCriteria(): string
    {
        return $this->passCriteria;
    }

    /**
     * @return SourceCollection
     */
    public function getSources(): SourceCollection
    {
        return $this->sources;
    }

    /**
     * @return DisplayedAuthors
     */
    public function getAuthors(): DisplayedAuthors
    {
        return $this->authors;
    }

    /**
     * @return QuestionId
     */
    public function getId(): QuestionId
    {
        return $this->id;
    }
}
