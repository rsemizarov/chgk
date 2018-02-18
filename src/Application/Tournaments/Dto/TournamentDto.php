<?php

namespace App\Application\Tournaments\Dto;

use App\Application\DateTimeNullable;
use App\Domain\Model\Author\DisplayedAuthors;
use App\Domain\Model\Tournament\Tournament;

class TournamentDto
{
    /**
     * @var Tournament
     */
    private $tournament;
    /**
     * @var DisplayedAuthors
     */
    private $displayedAuthors;

    /**
     * TournamentDto constructor.
     * @param Tournament $tournament
     * @param DisplayedAuthors $displayedAuthors
     */
    public function __construct(Tournament $tournament, DisplayedAuthors $displayedAuthors)
    {
        $this->tournament = $tournament;
        $this->displayedAuthors = $displayedAuthors;
    }

}
