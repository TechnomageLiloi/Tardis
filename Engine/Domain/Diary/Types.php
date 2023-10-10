<?php

namespace Liloi\I60\Domain\Diary;

/**
 * Class diary types.
 */
class Types
{
    public const BIOTECH = 1;
    public const ARTIFACTS = 2;
    public const TICKETS = 3;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::BIOTECH => 'Biotech',
        self::ARTIFACTS => 'Artifacts',
        self::TICKETS => 'Tickets',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}