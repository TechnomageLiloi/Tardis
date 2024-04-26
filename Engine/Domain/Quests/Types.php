<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const EXERCISE = 1;
    public const TICKET = 2;
    public const ARTIFACT = 3;

    public static $list = [
        self::EXERCISE => 'Exercise',
        self::TICKET => 'Ticket',
        self::ARTIFACT => 'Artifact',
    ];
}