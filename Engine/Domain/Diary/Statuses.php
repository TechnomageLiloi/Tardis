<?php

namespace Liloi\I60\Domain\Diary;

/**
 * Class Statuses
 *
 * @package Liloi\Rune\Domain\Interstate
 * @see \Liloi\Rune\Domain\Interstate\StatusesTest
 */
class Statuses
{
    public const TODO = 1;
    public const DEVELOPMENT = 2;
    public const COMPLETED = 3;
    public const REJECTED = 4;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::TODO => 'To Do',
        self::DEVELOPMENT => 'Development',
        self::COMPLETED => 'Completed',
        self::REJECTED => 'Rejected',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}