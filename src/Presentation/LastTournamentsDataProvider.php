<?php

namespace App\Presentation;

use App\Application\Tournaments\LastTournamentsQuery;
use App\Application\Tournaments\TournamentsQuery;

class LastTournamentsDataProvider
{
    /**
     * @var LastTournamentsQuery
     */
    private $lastTournamentsQuery;
    /**
     * @var TournamentsQuery
     */
    private $tournamentsQuery;

    public function __construct(LastTournamentsQuery $lastTournamentsQuery, TournamentsQuery $tournamentsQuery)
    {

        $this->lastTournamentsQuery = $lastTournamentsQuery;
        $this->tournamentsQuery = $tournamentsQuery;
    }


    public function provide(int $limit) : array
    {
        $ids = $this->lastTournamentsQuery->execute($limit);
        $tournaments = $this->tournamentsQuery->execute($ids);

        $result = [];

        foreach ($tournaments as $tournament) {
            $result[] = [
                'title' => $tournament->getTitle(),
                'id' =>  $tournament->getId()->getId(),
                'date1' => $tournament->getDateStart()->isEmpty() ? '' : $tournament->getDateStart()->format('Y-m-d'),
                'date2' => $tournament->getDateFinish()->isEmpty() ? '' : $tournament->getDateFinish()->format('Y-m-d'),
                'addedDate' => $tournament->getCreatedAt()->format('Y-m-d')
            ];
        }

        return [
            'tournaments' => $result
        ];
    }
}
