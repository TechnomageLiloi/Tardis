<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const CODEX = 1;
    public const ARTIFACT = 2;
    public const ADVENTURE = 3;

    public static $list = [
        self::CODEX => 'Codex',
        self::ARTIFACT => 'Artifact',
        self::ADVENTURE => 'Adventure',
    ];
}