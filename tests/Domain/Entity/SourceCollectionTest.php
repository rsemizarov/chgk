<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Model\Source\SourceCollection;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass SourceCollection */
class SourceCollectionTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /** @covers \App\Domain\Model\Source\SourceCollection::getArrayCopy() */
    public function testToArray()
    {
        $ar = ['1', '2', '3'];
        $collection = new SourceCollection($ar);
        $result = $collection->getArrayCopy();
        $this->assertEquals($ar, $result);
    }

    public function testForeach()
    {
        $ar = ['1', '2', '3'];
        $i = 0;
        $collection = new SourceCollection($ar);
        foreach ($collection as $item) {
            $this->assertEquals($ar[$i++], $item);
        }
    }

    /** @covers SourceCollection::__construct */
    public function testBadArguments()
    {
        $this->expectException('TypeError');
        new SourceCollection([1]);
    }
}
