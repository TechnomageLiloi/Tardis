<?php

namespace Liloi\Tardis\Domain\Config;

use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    public function testCheck(): void
    {
        $data = [
            'key_config' => '123',
            'param' => '{"string": "test"}'
        ];

        $entity = Entity::create($data);
        $this->assertEquals($data['key_config'], $entity->getKey());
        $this->assertEquals($data['param'], $entity->getParam());

        $this->assertEquals('test', $entity->getString());
        $entity->setString('test2');
        $this->assertEquals('test2', $entity->getString());
    }
}