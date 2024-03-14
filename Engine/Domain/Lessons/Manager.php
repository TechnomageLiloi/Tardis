<?php

namespace Liloi\TARDIS\Domain\Lessons;

use Liloi\API\Errors\Exception;
use Liloi\TARDIS\Domain\Manager as DomainManager;
use Liloi\TARDIS\Domain\Lessons\Types as ProblemsTypes;

/**
 * Lessons manager.
 *
 * @package Liloi\TARDIS\Domain\Lessons
 */
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
        $ts_start = date('Y-m-d', strtotime('monday this week'));
        $ts_finish = date('Y-m-d', strtotime('sunday this week'));

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_date between "%s" and "%s" order by start asc;',
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

            foreach (array_keys(Positions::$list) as $key)
            {
                $schedule[$day][$key] = [];
            }
        }

        foreach($rows as $row)
        {
            $entity = Entity::create($row);
            $schedule[$entity->getDateNumber()][$entity->getKeyPosition()][] = $entity;
        }

        return $schedule;
    }

    public static function loadTimetable(): array
    {
        $listPositions = array_keys(Positions::$list);
        array_shift($listPositions);
        $dt = date('Y-m-d');

        $timetable = [];

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start="%s" and key_degree in (%s) order by position asc;',
            $name, $dt, implode(', ', $listPositions)
        ));

        foreach($rows as $row)
        {
            $timetable[$row['position']] = Entity::create($row);
        }

        foreach($listPositions as $i)
        {
            if(isset($timetable[$i]))
            {
                continue;
            }

            $timetable[$i] = null;
        }

        foreach($timetable as $key => $value)
        {
            if(!empty($value))
            {
                continue;
            }

            $entity = self::create($key);
            $timetable[$key] = $entity;
        }

        return $timetable;
    }

    public static function loadByDate(string $dt): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start desc;',
            $name, $dt . ' 00:00:00', $dt . ' 23:59:59'
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[$row['key_lesson']] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadKarma(string $dt): int
    {
        $name = self::getTableName();

        return (int)self::getAdapter()->getSingle(sprintf(
            'select sum(mark) from %s where status=%s and start between "%s" and "%s";',
            $name, Status::COMPLETE, $dt . ' 00:00:00', $dt . ' 23:59:59'
        ));
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

    /**
     * @return Entity
     * @throws Exception
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where status=%s order by start desc limit 1',
            $name, Status::IN_HAND
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

        self::update(
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

    public static function create(string $position): Entity
    {
        $name = self::getTableName();
        $data = [
            'comment' => '-',
            'mark' => '0',
            'status' => Status::NO_LESSON,
            'start' => date('Y-m-d'),
            'data' => '{}',
            'type' => Types::CODEX, // @obsolete: Should remove in the next version.
            'key_degree' => '1',
            'position' => $position
        ];
        self::getAdapter()->insert($name, $data);
        $data['key_lesson'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }
}