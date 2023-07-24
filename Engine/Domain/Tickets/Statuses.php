<?php

namespace Liloi\I60\Domain\Tickets;

class Statuses
{
    public const COMPOSE = 1;
    public const TODO = 2;
    public const IN_HAND = 3;
    public const COMPLETED = 4;
    public const ARCHIVE = 5;
    public const CANCEL = 6;

    static public array $list = [
        self::COMPOSE => 'Compose',
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::COMPLETED => 'Completed',
        self::ARCHIVE => 'Archive',
        self::CANCEL => 'Cancel'
    ];

    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}