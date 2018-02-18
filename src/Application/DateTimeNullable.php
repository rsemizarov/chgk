<?php
declare(strict_types=1);

namespace App\Application;

class DateTimeNullable extends \DateTimeImmutable
{
    const EMPTY_VALUE = '0000-01-01';

    public static function createEmpty () : self
    {
        $result = new self();
        $emptyDate = \DateTime::createFromFormat('Y-m-d', self::EMPTY_VALUE);
        $emptyTimestamp = $emptyDate->getTimestamp();

        return $result->setTimestamp($emptyTimestamp);
    }

    public function isEmpty()
    {
        return $this->format('Y-m-d') === self::EMPTY_VALUE;
    }

    /**
     * @param string $date
     * @return DateTimeNullable
     */
    public static function createFromMysql(string $date) : self
    {
        $date = \DateTime::createFromFormat('Y-m-d', $date);
        if (!$date) {
            return self::createEmpty();
        }
        $result = new self();

        return $result->setTimestamp($date->getTimestamp());
    }

    public function getFormatted()
    {
        return $this->format('d.m.Y');
    }
}
