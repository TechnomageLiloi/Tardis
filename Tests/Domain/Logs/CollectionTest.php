<?php

namespace Liloi\I60\Domain\Logs;

use PHPUnit\Framework\TestCase;

class CheckTest extends TestCase
{
    public function testCheck(): void
    {
        $collection = new Collection();
        $this->assertTrue($collection instanceof Collection);
        $this->assertTrue($collection instanceof \ArrayObject);
    }
}