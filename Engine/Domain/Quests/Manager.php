<?php

namespace Liloi\Rune\Domain\Quests;

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
        return self::getTablePrefix() . 'quests';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_quest desc limit 17;',
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
     * Load quest from database.
     *
     * @param string $key_quest
     * @return Entity
     * @throws Exception
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where status in ("%s", "%s") order by key_quest desc;',
            $name, Statuses::TODO, Statuses::IN_HAND
        ));

        if(!$row)
        {
            return self::create();
        }

        return Entity::create($row);
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

        self::update(
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
    public static function create(): Entity
    {
        $name = self::getTableName();
        $data = [
            'title' => '-',
            'summary' => '-',
            'status' => Statuses::IN_HAND,
            'type' => Types::CODEX,
            'start' => date('Y-m-d H:i:s'),
            'finish' => date('Y-m-d H:i:s'),
        ];
        self::getAdapter()->insert($name, $data);
        $data['key_quest'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }

    public static function schedule(): array
    {
        $ts_start = date('Y-m-d', strtotime('monday this week'));
        $ts_finish = date('Y-m-d', strtotime('sunday this week'));

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s 00:00:00" and "%s 23:59:59" order by start asc;',
            $name, $ts_start, $ts_finish
        ));

        $schedule = [];

        for ($hour = 0; $hour < 24; $hour++)
        {
            $schedule[$hour] = [];

            for ($day = 1; $day <= 7; $day++)
            {
                $schedule[$hour][$day] = [];
            }
        }

        foreach($rows as $row)
        {
            $entity = Entity::create($row);

            $schedule[$entity->getTime()][$entity->getDateNumber()][] = $entity;
        }

        return $schedule;
    }
}