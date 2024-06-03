<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const CODEX = 1;
    public const BIOTECH = 2;
    public const MENTAT = 3;
    public const PRIOR = 4;
    public const SPELLS = 5;
    public const QUESTS = 6;
    public const HOME = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::MENTAT => 'Mentat',
        self::PRIOR => 'Prior',
        self::SPELLS => 'Spells',
        self::QUESTS => 'Quests',
        self::HOME => 'Home',
    ];
}