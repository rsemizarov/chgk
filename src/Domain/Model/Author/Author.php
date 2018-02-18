<?php
declare(strict_types=1);

namespace App\Domain\Model\Author;

class Author
{
    private $name;

    private $id;

    public function __construct(AuthorId $id, string $name, string $surname)
    {
    }
}
