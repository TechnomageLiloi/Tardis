<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const CODEX = 1;
    public const BIOTECH = 2;
    public const MENTAT = 3;
    public const PRIOR = 4;
    public const ARTIFACT = 5;
    public const PROBLEM = 6;
    public const FAMILY = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::MENTAT => 'Mentat',
        self::PRIOR => 'Prior',
        self::ARTIFACT => 'Artifact',
        self::PROBLEM => 'Problem',
        self::FAMILY => 'Family',
    ];
}