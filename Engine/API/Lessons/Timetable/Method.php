<?php

namespace Liloi\Rune\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager as LessonsManager;
use Liloi\Rune\Domain\Lessons\Status;
use Liloi\Rune\Domain\Problems\Types as ProblemsTypes;
use Liloi\Rune\Domain\Problems\Manager as ProblemsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $timetableLessons = LessonsManager::loadTimetable();
        $timetableProblems = ProblemsManager::loadTimetable();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'lessons' => $timetableLessons,
            'problems' => $timetableProblems,
            'statuses' => Status::$list,
            'types' => ProblemsTypes::$list,
        ]));

        return $response;
    }
}