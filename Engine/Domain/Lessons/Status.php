<?php

namespace Liloi\Rune\Domain\Lessons;

class Status
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const COMPLETE = 3;
    public const FAILURE = 4;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::COMPLETE => 'Complete',
        self::FAILURE => 'Failure'
    ];
}