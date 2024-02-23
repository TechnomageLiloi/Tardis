<?php

namespace Liloi\TARDIS\Domain\Quests;

use Liloi\API\Errors\Exception;
use Liloi\TARDIS\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'quests';
    }

    /**
     * Load quest from database.
     *
     * @param string $key_quest
     * @return Entity
     * @throws Exception
     */
    public static function load(string $key_quest): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_quest="%s"',
            $name,
            $key_quest
        ));

        if(!$row)
        {
            throw new Exception('Unknown UID');
        }

        return Entity::create($row);
    }

    /**
     * Save quest to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_quest'];
        unset($data['key_quest']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_quest = "%s"', $key)
        );
    }

    /**
     * Remove quest from database.
     *
     * @param Entity $entity
     */
    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_quest = "%s"', $key)
        );
    }

    /**
     * Create quest in database.
     */
    public static function create(): void
    {
        $name = self::getTableName();
        $data = [
            'title' => '-',
            'summary' => '-',
            'status' => Statuses::TODO
        ];
        self::getAdapter()->insert($name, $data);
    }
}