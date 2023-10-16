<?php

namespace Liloi\Tardis\Domain\Problems;

/**
 * Types of problems.
 *
 * @package Liloi\Tardis\Domain\Problems
 */
class Types
{
    public const ADVENTURE = 1;
    public const CODEX = 2;
    public const BIOTECH = 3;
    public const EXAMS = 4;
    public const PROJECTS = 5;
    public const ARTIFACTS = 6;
    public const FAMILY = 7;

    public static $list = [
        self::ADVENTURE => 'Adventure',
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::EXAMS => 'Exams',
        self::PROJECTS => 'Projects',
        self::ARTIFACTS => 'Artifacts',
        self::FAMILY => 'Family'
    ];
}