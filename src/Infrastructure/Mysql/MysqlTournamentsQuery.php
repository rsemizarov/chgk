<?php

namespace App\Infrastructure\Mysql;

use App\Application\DateTimeNullable;
use App\Application\Tournaments\TournamentsQuery;
use App\Domain\Model\Tournament\GroupId;
use App\Domain\Model\Tournament\Tournament;
use App\Domain\Model\Tournament\TournamentId;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use PDO;
use Psr\Log\LoggerInterface;

class MysqlTournamentsQuery implements TournamentsQuery
{
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        $this->connection = $connection;
        $this->logger = $logger;
    }

    /**
     * @param array $ids
     *
     * @return Tournament[]
     */
    public function execute(array $ids)
    {
        array_walk($ids, function ($id) { if (!is_string($id)) {throw new \TypeError();}});

        $query = "SELECT t1.Title, t1.TextId, DATE(t1.PlayedAt) as PlayedAt, DATE(t1.PlayedAt2) as PlayedAt2, 
                t1.CreatedAt, t2.TextId as groupId, t1.Editors 
            FROM Tournaments t1
            INNER JOIN Tournaments t2 ON (t1.ParentId = t2.Id)
            WHERE t1.TextId IN (:ids)
        ";
        try {
            $res = $this->connection->executeQuery($query, ['ids' => $ids], ['ids' => Connection::PARAM_STR_ARRAY]);
        } catch (DBALException $e) {
            $this->logger->alert($e->getMessage());
            throw new CanNotFetchDataException('', 0, $e);
        }

        $tournaments = array_flip($ids);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $date1 = $row['PlayedAt'] ? DateTimeNullable::createFromMysql($row['PlayedAt']) : DateTimeNullable::createEmpty();
            $date2 = $row['PlayedAt2'] ? DateTimeNullable::createFromMysql($row['PlayedAt2']) : DateTimeNullable::createEmpty();
            $dateCreated = DateTimeNullable::createFromMysql($row['CreatedAt']);
            $tournament = new Tournament(
                new TournamentId($row['TextId']),
                new GroupId($row['groupId']),
                $row['Title'],
                $date1,
                $date2,
                $dateCreated
            );

            $tournaments[$row['TextId']] = $tournament;
        }

        $tournaments = array_filter($tournaments, function ($a) { return $a instanceof Tournament;});

        return $tournaments;
    }
}
