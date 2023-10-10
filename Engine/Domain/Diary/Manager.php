<?php

namespace Liloi\I60\Domain\Diary;

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

    /**
     * Load day by key.
     *
     * @param string $key_day
     * @return Entity
     */
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

    /**
     * Load current day.
     *
     * @return Entity
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s order by key_day desc limit 1;',
            $name
        ));

        return Entity::create($row);
    }

    /**
     * Save day.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_day']);

        self::update($name, $data, sprintf('key_day="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'title' => 'Enter the title',
            'program' => '-',
            'data' => '{}',
            'status' => Statuses::TODO,
            'type' => Types::BIOTECH,
            'start' => date('Y-m-d H:i:s'),
            'finish' => date('Y-m-d H:i:s')
        ]);
    }
}