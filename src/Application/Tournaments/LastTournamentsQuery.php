<?php

namespace App\Application\Tournaments;

interface LastTournamentsQuery
{
    /**
     * @param int $limit
     * @return string[]
     */
    public function execute(int $limit) : array;
}
