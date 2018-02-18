<?php

namespace App\Infrastructure\Mysql;

use App\Application\Tournaments\LastTournamentsQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use PDO;
use Psr\Log\LoggerInterface;

class MysqlLastTournamentsQuery implements LastTournamentsQuery
{
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * MysqlLastTournamentsQuery constructor.
     * @param Connection $connection
     * @param LoggerInterface $logger
     */
    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        $this->connection = $connection;
        $this->logger = $logger;
    }

    /**
     * @param int $limit
     * @return array
     */
    public function execute(int $limit): array
    {

        $query = "
            SELECT TextId
            FROM Tournaments t 
            WHERE t.type='Ч'
            ORDER BY t.CreatedAt DESC, t.PlayedAt ASC, t.FileName ASC
            LIMIT :limit";

        try {
            $r = $this->connection->executeQuery($query, ['limit' => $limit], ['limit'=>PDO::PARAM_INT]);
        } catch (DBALException $e) {
            $this->logger->alert('Can not fetch data', array('exception' => $e));
            throw new CanNotFetchDataException('', 0, $e);
        }

        $result = $r->fetchAll(\PDO::FETCH_COLUMN);

        return $result;
    }
}
