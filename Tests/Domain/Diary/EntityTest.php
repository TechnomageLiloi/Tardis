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

        $this->assertEquals('Development', $entity->getStatusTitle());
    }

    public function testID(): void
    {
        $entity = Entity::create(['key_day' => '123']);
        $this->assertEquals('00-00-00-00-00-01-23', $entity->getID());

        $entity = Entity::create(['key_day' => '2123']);
        $this->assertEquals('00-00-00-00-00-21-23', $entity->getID());

        $entity = Entity::create(['key_day' => '12123']);
        $this->assertEquals('00-00-00-00-01-21-23', $entity->getID());

        $entity = Entity::create(['key_day' => '512123']);
        $this->assertEquals('00-00-00-00-51-21-23', $entity->getID());

        $entity = Entity::create(['key_day' => '512123512123']);
        $this->assertEquals('00-51-21-23-51-21-23', $entity->getID());

        $entity = Entity::create(['key_day' => '1512123512123']);
        $this->assertEquals('01-51-21-23-51-21-23', $entity->getID());

        $entity = Entity::create(['key_day' => '17512123512123']);
        $this->assertEquals('17-51-21-23-51-21-23', $entity->getID());
    }
}