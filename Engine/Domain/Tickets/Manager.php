<?php

namespace Liloi\TARDIS\Domain\Tickets;

use Liloi\API\Errors\Exception;
use Liloi\TARDIS\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

class Manager extends DomainManager
{
    public const POWER = '1';
    public const TIME_TODO = '00:00:00';

    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'tickets';
    }

    /**
     * Load problem from database.
     *
     * @param string $keyTicket
     * @return Entity
     * @throws Exception
     */
    public static function load(string $keyTicket): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_ticket="%s"',
            $name,
            $keyTicket
        ));

        if(!$row)
        {
            throw new Exception('Unknown ticket key.');
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
        $key = $data['key_ticket'];
        unset($data['key_ticket']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_ticket = "%s"', $key)
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
            sprintf('key_ticket = "%s"', $key)
        );
    }

    /**
     * Create problem in database.
     *
     * @param string $keyLesson
     */
    public static function create(string $keyLesson): Entity
    {
        Assert::notEmpty($keyLesson, 'Ticket key is empty.');

        $name = self::getTableName();
        $data = [
            'key_lesson' => $keyLesson,
            'title' => '-',
            'start' => self::TIME_TODO,
            'finish' => self::TIME_TODO,
            'power' => self::POWER
        ];

        self::getAdapter()->insert($name, $data);

        $data['key_ticket'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }

    public static function loadByLessonKeys(array $keysLessons): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_lesson in (%s) order by start asc',
            $name, implode(', ', $keysLessons)
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Gets current karma.
     *
     * @return int
     */
    public static function loadKarma(): int
    {
        $nameTickets = self::getTableName();
        $nameLessons = self::getTablePrefix() . 'lessons';
        $dateStart = date('Y-m-d', strtotime('-1 week'));
        $dateFinish = date('Y-m-d');;

        $karma = self::getAdapter()->getSingle(sprintf(
            'select sum(%s.power) from %s, %s
             where %s.key_lesson = %s.key_lesson
             and %s.start between "%s" and "%s"',
            $nameTickets, $nameTickets, $nameLessons, $nameTickets, $nameLessons, $nameLessons, $dateStart, $dateFinish
        ));

        if(!$karma)
        {
            return 0;
        }

        return $karma;
    }
}