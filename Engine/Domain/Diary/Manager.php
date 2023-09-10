<?php

namespace Liloi\I60\Domain\Diary;

use Liloi\API\Errors\Exception;
use Liloi\I60\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'diary';
    }

    public static function load(string $key_day): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_day="%s";',
            $name, $key_day
        ));

        if(!$row)
        {
            // @todo: throw exception
        }

        return Entity::create($row);
    }

    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s order by key_day desc limit 1;',
            $name
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_day']);

        self::update($name, $data, sprintf('key_day="%s"', $entity->getKey()));
    }
}