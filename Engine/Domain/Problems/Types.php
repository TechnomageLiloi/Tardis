<?php

namespace Liloi\Tardis\Domain\Problems;

class Types
{
    public const PROTOCOLS = 1;
    public const TRAINING = 2;
    public const PROJECTS = 3;
    public const SURVIVAL = 4;
    public const EXAMS = 5;
    public const ARTIFACTS = 6;
    public const FAMILY = 7;

    public static $list = [
        self::PROTOCOLS => 'Protocols',
        self::TRAINING => 'Training',
        self::PROJECTS => 'Projects',
        self::SURVIVAL => 'Survival',
        self::EXAMS => 'Exams',
        self::ARTIFACTS => 'Artifacts',
        self::FAMILY => 'Family'
    ];
}