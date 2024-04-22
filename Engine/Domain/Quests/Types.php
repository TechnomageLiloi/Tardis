<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const TICKET = 1;
    public const QUEST = 2;
    public const PROBLEM = 3;

    public static $list = [
        self::TICKET => 'Ticket',
        self::QUEST => 'Quest',
        self::PROBLEM => 'Problem',
    ];
}