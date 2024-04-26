<?php

namespace Liloi\Rune\Domain\Plan;

class Statuses
{
    public const NOT_DONE = 1;
    public const DONE = 2;

    public static $list = [
        self::NOT_DONE => 'Not done',
        self::DONE => 'Done',
    ];

    /**
     * Gets status class.
     *
     * @return string
     */
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}