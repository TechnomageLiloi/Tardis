<?php

namespace Liloi\I60\Domain\Tickets;

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
        return self::getTablePrefix() . 'tickets';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status not in ("%s", "%s") order by key_ticket desc;',
            $name, Statuses::ARCHIVE, Statuses::CANCEL
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadPeriod(string $from, string $to): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start desc;',
            $name, $from, $to
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadToday(): Collection
    {
        $start = gmdate('Y-m-d 00:00:00');
        $finish = gmdate('Y-m-d 23:59:59');

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start desc;',
            $name, $start, $finish
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadJournal(): Collection
    {
        $start = gmdate('Y-m-d 00:00:00');
        $finish = gmdate('Y-m-d 23:59:59');

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start desc;',
            $name, $start, $finish
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function create(): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'title' => 'Enter the title',
            'program' => 'Enter the program',
            'status' => Statuses::COMPOSE,
            'difficulty' => Difficulties::NO_THINK
        ]);
    }

    public static function load(string $key_ticket): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_ticket="%s";',
            $name, $key_ticket
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_ticket']);

        self::update($name, $data, sprintf('key_ticket="%s"', $entity->getKey()));
    }
}