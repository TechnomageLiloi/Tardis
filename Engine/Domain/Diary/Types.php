<?php

namespace Liloi\I60\Domain\Diary;

/**
 * Class diary types.
 */
class Types
{
    public const BIOTECH = 1;
    public const PROJECTS = 2;
    public const ARTIFACTS = 3;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::BIOTECH => 'Biotech',
        self::PROJECTS => 'Projects',
        self::ARTIFACTS => 'Artifacts',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}