<?php

namespace Liloi\I60\Domain\Config;

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
        return self::getTablePrefix() . 'config';
    }

    /**
     * Load config by key.
     *
     * @param string $key_config
     * @return Entity
     */
    public static function load(string $key_config): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_config="%s";',
            $name, $key_config
        ));

        if(!$row)
        {
            $row = [
                'key_config' => $key_config,
                'param' => '{}'
            ];
            self::getAdapter()->insert($name, $row);
        }

        return Entity::create($row);
    }

    /**
     * `true` is config by key exist; `false` otherwise.
     *
     * @param string $key_config
     * @return bool
     */
    public static function exist(string $key_config): bool
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_config="%s";',
            $name, $key_config
        ));

        return (bool)$row;
    }

    /**
     * Save config.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_config']);

        self::update($name, $data, sprintf('key_config="%s"', $entity->getKey()));
    }
}