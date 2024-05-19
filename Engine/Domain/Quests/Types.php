<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const CODEX = 1;
    public const BIOTECH_BIONIC = 2;
    public const BIOTECH_MENTATUS = 3;
    public const BIOTECH_PRIORUS = 4;
    public const ATOM = 5;
    public const ARTIFACT = 6;
    public const FAMILY = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH_BIONIC => 'Biotech Bionic',
        self::BIOTECH_MENTATUS => 'Biotech Mentatus',
        self::BIOTECH_PRIORUS => 'Biotech Priorus',
        self::ATOM => 'Atom',
        self::ARTIFACT => 'Artifact',
        self::FAMILY => 'Family',
    ];
}