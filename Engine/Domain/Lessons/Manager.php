<?php

namespace Liloi\Tardis\Domain\Lessons;

use Liloi\API\Errors\Exception;
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
        return self::getTablePrefix() . 'lessons';
    }

    public static function schedule(string $date_now): array
    {
        $ts_start = date('Y-m-d 00:00:00', strtotime('monday this week'));
        $ts_finish = date('Y-m-d 23:59:59', strtotime('sunday this week'));

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start asc;',
            $name, $ts_start, $ts_finish
        ));

        $schedule = [];

        for($day=1;$day<=7;$day++)
        {
            $schedule[$day] = [];
            for ($hour=0;$hour<24;$hour++)
            {
                $schedule[$day][$hour] = [];
            }
        }

        foreach($rows as $row)
        {
            $entity = Entity::create($row);
            $schedule[$entity->getDateNumber()][$entity->getTime()][] = $entity;
        }

        return $schedule;
    }

    public static function loadCollection(string $key_problem): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_problem=%s order by key_lesson desc;',
            $name, $key_problem
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[$row['key_lesson']] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_lesson="%s"',
            $name,
            $key
        ));

        if(!$row)
        {
            throw new Exception('Unknown key.');
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_lesson'];
        unset($data['key_lesson']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_lesson = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_lesson = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create($key_problem): void
    {
        $name = self::getTableName();
        $data = [
            'key_problem' => $key_problem,
            'comment' => 'Enter the comment',
            'mark' => '0',
            'status' => Status::TODO,
            'start' => date('Y-m-d H:i:s'),
            'finish' => date('Y-m-d H:i:s'),
            'data' => '{}'
        ];
        self::getAdapter()->insert($name, $data);
    }
}