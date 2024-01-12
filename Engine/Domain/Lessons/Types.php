<?php

namespace Liloi\Rune\Domain\Lessons;

/**
 * Types of problems.
 *
 * @package Liloi\Rune\Domain\Problems
 */
class Types
{
    public const FREEDOM = 1;
    public const BIOTECH = 2;
    public const THEORY = 3;
    public const CODEX = 4;
    public const PROJECTS = 5;
    public const ARTIFACTS = 6;
    public const FAMILY = 7;

    public static $list = [
        self::FREEDOM => 'Freedom',
        self::BIOTECH => 'Biotech',
        self::THEORY => 'Theory',
        self::CODEX => 'Codex',
        self::PROJECTS => 'Projects',
        self::ARTIFACTS => 'Artifacts',
        self::FAMILY => 'Family',
    ];
}