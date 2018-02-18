<?php
declare(strict_types=1);

namespace App\Domain\Model\Source;

class SourceCollection extends \ArrayObject
{
    public function __construct(array $sources)
    {
        array_map(
            function ($item) {
                if (!is_string($item)) {
                    throw new \TypeError((string) $item);
                }
            },
            $sources
        );
        parent::__construct($sources);
    }
}
