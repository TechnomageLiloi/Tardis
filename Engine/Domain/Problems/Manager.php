<?php

namespace Liloi\Tardis\Domain\Problems;

use Liloi\API\Errors\Exception;
use Liloi\Tardis\Domain\Manager as DomainManager;
use Liloi\Tardis\Domain\Degrees\Manager as DegreesManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'problems';
    }

    public static function loadCollection(string $uid): Collection
    {
        $milestone = DegreesManager::load($uid);

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_degree=%s order by key_problem desc;',
            $name, $milestone->getKey()
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_problem): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_problem="%s"',
            $name,
            $key_problem
        ));

        if(!$row)
        {
            throw new Exception('Unknown UID');
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_problem'];
        unset($data['key_problem']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_problem = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_problem = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create($key_degree, $id_type): void
    {
        $name = self::getTableName();
        $data = [
            'key_degree' => $key_degree,
            'title' => 'Enter the title: ' . gmdate('Y-m-d-H-i-s'),
            'program' => '// comment',
            'type' => $id_type,
            'mark' => '0'
        ];
        self::getAdapter()->insert($name, $data);
    }
}