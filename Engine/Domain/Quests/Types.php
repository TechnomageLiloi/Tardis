<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const TICKET = 1;
    public const PROBLEM = 2;
    public const QUEST = 3;

    public static $list = [
        self::TICKET => 'Ticket',
        self::PROBLEM => 'Problem',
        self::QUEST => 'Quest',
    ];
}