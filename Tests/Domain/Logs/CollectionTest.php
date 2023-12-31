<?php

namespace Liloi\Tardis\Domain\Logs;

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testCheck(): void
    {
        $collection = new Collection();
        $this->assertTrue($collection instanceof Collection);
        $this->assertTrue($collection instanceof \ArrayObject);
    }
}