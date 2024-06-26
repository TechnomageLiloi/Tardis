<?php

namespace Liloi\Rune\Domain\Quests;

class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const SUCCESS = 3;
    public const FAILURE = 4;
    public const CONTINUE = 5;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::SUCCESS => 'Success',
        self::FAILURE => 'Failure',
        self::CONTINUE => 'Continue',
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