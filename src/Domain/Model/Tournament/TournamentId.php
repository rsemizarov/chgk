<?php

namespace App\Domain\Model\Tournament;

class TournamentId
{
    /**
     * @var string
     */
    private $id;

    /**
     * TournamentId constructor.
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
