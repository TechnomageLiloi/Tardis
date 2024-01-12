<?php

namespace Liloi\Rune\Domain\Lessons;

use Liloi\API\Errors\Exception;
use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Domain\Problems\Types as ProblemsTypes;

/**
 * Lessons manager.
 *
 * @package Liloi\Rune\Domain\Lessons
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

    public static function loadTimetable(): array
    {
        $timetable = array_combine(array_keys(ProblemsTypes::$list), [[],[],[],[],[],[],[]]);

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status in (1, 2) order by start desc;',
            $name
        ));

        foreach($rows as $row)
        {
            $timetable[$row['type']][$row['key_lesson']] = Entity::create($row);
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

    public static function loadByAtom(string $keyAtom): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_atom = "%s" and status in (1, 2) order by start asc;',
            $name,  $keyAtom
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

    /**
     * Gets karma for period.
     *
     * @param string $dtFrom Start timestamp of period (inclusively).
     * @param string $dtTo Finish timestamp of period (inclusively).
     * @return int Result karma.
     */
    public static function loadKarmaForPeriod(string $dtFrom, string $dtTo): int
    {
        $name = self::getTableName();

        return (int)self::getAdapter()->getSingle(sprintf(
            'select sum(mark) from %s where status=%s and start between "%s" and "%s";',
            $name, Status::COMPLETE, $dtFrom, $dtTo
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
    public static function create(string $keyAtom): void
    {
        $name = self::getTableName();
        $data = [
            'key_atom' => $keyAtom,
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