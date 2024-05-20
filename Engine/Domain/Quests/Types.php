<?php

namespace Liloi\Rune\Domain\Quests;

class Types
{
    public const CODEX = 1;
    public const BIOTECH_BIONIC = 2;
    public const BIOTECH_MENTATUS = 3;
    public const BIOTECH_PRIORUS = 4;
    public const ARTIFACT = 5;
    public const PROBLEM = 6;
    public const FAMILY = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH_BIONIC => 'Biotech Bionic',
        self::BIOTECH_MENTATUS => 'Biotech Mentatus',
        self::BIOTECH_PRIORUS => 'Biotech Priorus',
        self::ARTIFACT => 'Artifact',
        self::PROBLEM => 'Problem',
        self::FAMILY => 'Family',
    ];
}