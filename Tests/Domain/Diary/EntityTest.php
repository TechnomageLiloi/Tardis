<?php

namespace Liloi\I60\Domain\Diary;

use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    public function testCheck(): void
    {
        $data = [
            'key_day' => '123',
            'title' => 'Enter the title',
            'status' => '2',
            'program' => 'Enter the program',
            'data' => '{}'
        ];

        $entity = Entity::create($data);
        $this->assertEquals($data['key_day'], $entity->getKey());
        $this->assertEquals($data['title'], $entity->getTitle());
        $this->assertEquals($data['status'], $entity->getStatus());
        $this->assertEquals($data['program'], $entity->getProgram());
        $this->assertEquals($data['data'], $entity->getData());

        $this->assertEquals('00-00-00-00-00-01-23', $entity->getID());
        $this->assertEquals('Development', $entity->getStatusTitle());
    }
}