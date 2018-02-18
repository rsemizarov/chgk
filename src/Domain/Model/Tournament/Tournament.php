<?php

namespace App\Domain\Model\Tournament;

use App\Application\DateTimeNullable;

class Tournament
{
    /**
     * @var TournamentId
     */
    private $id;
    /**
     * @var GroupId
     */
    private $groupId;
    /**
     * @var string
     */
    private $title;
    /**
     * @var DateTimeNullable
     */
    private $dateStart;
    /**
     * @var DateTimeNullable
     */
    private $dateFinish;
    /**
     * @var DateTimeNullable
     */
    private $createdAt;

    /**
     * Tournament constructor.
     * @param TournamentId $id
     * @param GroupId $groupId
     * @param string $title
     * @param DateTimeNullable $dateStart
     * @param DateTimeNullable $dateFinish
     */
    public function __construct(TournamentId $id, GroupId $groupId, string $title, DateTimeNullable $dateStart, DateTimeNullable $dateFinish, DateTimeNullable $createdAt)
    {
        $this->id = $id;
        $this->groupId = $groupId;
        $this->title = $title;
        $this->dateStart = $dateStart;
        $this->dateFinish = $dateFinish;
        $this->createdAt = $createdAt;
    }

    /**
     * @return TournamentId
     */
    public function getId(): TournamentId
    {
        return $this->id;
    }

    /**
     * @return GroupId
     */
    public function getGroupId(): GroupId
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return DateTimeNullable
     */
    public function getDateStart(): DateTimeNullable
    {
        return $this->dateStart;
    }

    /**
     * @return DateTimeNullable
     */
    public function getDateFinish(): DateTimeNullable
    {
        return $this->dateFinish;
    }

    /**
     * @return DateTimeNullable
     */
    public function getCreatedAt(): DateTimeNullable
    {
        return $this->createdAt;
    }
}
