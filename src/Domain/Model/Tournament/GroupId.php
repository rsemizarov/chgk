<?php

namespace App\Domain\Model\Tournament;

class GroupId
{
    /**
     * @var string
     */
    private $id;

    /**
     * GroupId constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {

        $this->id = $id;
    }
}
