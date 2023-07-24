<?php

namespace Liloi\I60\Domain\Tickets;

class Difficulties
{
    public const NO_THINK = 1;
    public const SIMPLE = 2;
    public const NORMAL = 3;
    public const HARD = 4;
    public const PUZZLE = 5;
    public const IMPOSSIBLE = 6;
    public const TEACHER = 7;
    public const BONUS = 8;
    public const FINE = 9;

    static public array $list = [
        self::NO_THINK => 'No think',
        self::SIMPLE => 'Simple',
        self::NORMAL => 'Normal',
        self::HARD => 'Hard',
        self::PUZZLE => 'Puzzle',
        self::IMPOSSIBLE => 'Impossible',
        self::TEACHER => 'TD (Teacher`s Difficulty)',
        self::BONUS => 'Bonus',
        self::FINE => 'Fine',
    ];

    static public array $marks = [
        self::NO_THINK => 1,
        self::SIMPLE => 5,
        self::NORMAL => 10,
        self::HARD => 20,
        self::PUZZLE => 50,
        self::IMPOSSIBLE => 100,
        self::TEACHER => 1000,
        self::BONUS => 10,
        self::FINE => -10,
    ];
}