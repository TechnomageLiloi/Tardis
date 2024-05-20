<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const CODEX = 1;
    public const BIOTECH = 2;
    public const GAMES = 3;
    public const ADVENTURE = 4;
    public const ARTIFACT = 5;
    public const PROBLEM = 6;
    public const FAMILY = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::GAMES => 'Games',
        self::ADVENTURE => 'Adventure',
        self::ARTIFACT => 'Artifact',
        self::PROBLEM => 'Problem',
        self::FAMILY => 'Family',
    ];
}