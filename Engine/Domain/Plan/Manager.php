<?php

namespace Liloi\Rune\Domain\Plan;

use Liloi\API\Errors\Exception;
use Liloi\Rune\Domain\Manager as DomainManager;
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
        return self::getTablePrefix() . 'plan';
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
        $key = $data['key_plan'];
        unset($data['key_plan']);

        self::update(
            $name,
            $data,
            sprintf('key_plan = "%s"', $key)
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
            sprintf('key_plan = "%s"', $key)
        );
    }
}