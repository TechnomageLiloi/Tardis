<?php

namespace Liloi\TARDIS\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager as LessonsManager;
use Liloi\TARDIS\Domain\Lessons\Status;
use Liloi\TARDIS\Domain\Problems\Types as ProblemsTypes;
use Liloi\TARDIS\Domain\Problems\Manager as ProblemsManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
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