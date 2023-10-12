<?php

namespace Liloi\Tardis\Domain\Logs;

use Liloi\Judex\Assert;
use Liloi\Tardis\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'logs';
    }

    /**
     * Load log collection.
     *
     * @return Collection
     */
    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_log desc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Create new log.
     *
     * @param Entity $entity
     */
    public static function create(Entity $entity): void
    {
        $name = self::getTableName();

        self::insert($name, [
            'title' => $entity->getTitle(),
            'data' => $entity->getData()
        ]);
    }

    /**
     * Load log by key.
     *
     * @param string $key_log
     * @return Entity
     */
    public static function load(string $key_log): Entity
    {
        $name = self::getTableName();

        $SQL = sprintf('select * from %s where key_log="%s";', $name, $key_log);

        $row = self::getAdapter()->getRow($SQL);

        Assert::true($row, 'Log tuple is not found at database', null, ['SQL' => $SQL]);

        return Entity::create($row);
    }

    /**
     * Save log.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_log']);

        self::update($name, $data, sprintf('key_log="%s"', $entity->getKey()));
    }
}