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

    /**
     * Load collection of problems by degree uid.
     *
     * @param string $uidDegree
     * @return Collection
     */
    public static function loadCollection(string $uidDegree): Collection
    {
        $milestone = DegreesManager::load($uidDegree);

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

    /**
     * Load problem from database.
     *
     * @param string $key_problem
     * @return Entity
     * @throws Exception
     */
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

    /**
     * Save problem to database.
     *
     * @param Entity $entity
     */
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

    /**
     * Remove problem from database.
     *
     * @param Entity $entity
     */
    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_problem = "%s"', $key)
        );
    }

    /**
     * Create problem in database.
     *
     * @param $key_degree
     * @param $id_type
     */
    public static function create($key_degree, $id_type): void
    {
        $name = self::getTableName();
        $data = [
            'key_degree' => $key_degree,
            'mark' => '0',
            'program' => '// comment',
            'title' => 'Enter the title: ' . gmdate('Y-m-d-H-i-s'),
            'type' => $id_type,
        ];
        self::getAdapter()->insert($name, $data);
    }
}