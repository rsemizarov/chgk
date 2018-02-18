<?php

namespace App\Application\Tournaments;

use App\Domain\Model\Tournament\Tournament;

interface TournamentsQuery
{
    /**
     * @param array $ids
     *
     * @return Tournament[]
     */
    public function execute(array $ids);
}
