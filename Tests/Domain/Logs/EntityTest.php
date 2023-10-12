<?php

namespace Liloi\Tardis\Domain\Logs;

use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    public function testCheck(): void
    {
        $data = [
            'key_log' => '123',
            'title' => 'Enter the title',
            'data' => '{}'
        ];

        $entity = Entity::create($data);
        $this->assertEquals($data['key_log'], $entity->getKey());
        $this->assertEquals($data['title'], $entity->getTitle());
        $this->assertEquals($data['data'], $entity->getData());
    }
}