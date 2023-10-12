<?php

namespace Liloi\Tardis\Domain\Plans;

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
        return self::getTablePrefix() . 'plans';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_plan desc;',
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
     * Load day by key.
     *
     * @param string $keyPlan
     * @return Entity
     */
    public static function load(string $keyPlan): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_plan="%s";',
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
            'select * from %s order by key_plan desc limit 1;',
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
        unset($data['key_plan']);

        self::update($name, $data, sprintf('key_plan="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'title' => 'Enter the protected title (f.e. bachelor, master, doctor, etc.)',
            'program' => '-',
            'status' => Statuses::TODO
        ]);
    }
}