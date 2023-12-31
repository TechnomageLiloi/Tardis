<?php

namespace Liloi\Tardis\Domain\Degrees;

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
        return self::getTablePrefix() . 'degrees';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_degree desc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $uid): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where uid="%s"',
            $name,
            $uid
        ));

        if(!$row)
        {

        }

        return Entity::create($row);
    }

    /**
     * Load day by key.
     *
     * @param string $keyPlan
     * @return Entity
     */
    public static function loadByKey(string $keyPlan): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_degree="%s";',
            $name, $keyPlan
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
            'select * from %s order by key_degree desc limit 1;',
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
        unset($data['key_degree']);

        self::update($name, $data, sprintf('key_degree="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'uid' => 'uid-' . date('Y-m-d-H-i-s'),
            'title' => 'Enter the degree title (f.e. bachelor, master, doctor, etc.)',
            'program' => '-',
            'status' => Statuses::TODO
        ]);
    }
}