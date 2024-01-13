<?php

namespace Liloi\TARDIS\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Entity as LessonsEntity;
use Liloi\TARDIS\Domain\Lessons\Manager as LessonsManager;
use Liloi\TARDIS\Domain\Lessons\Status as LessonsStatus;
use Liloi\TARDIS\Domain\Lessons\Types as LessonsTypes;
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

        $keysLessons = [];

        /** @var LessonsEntity $entity */
        foreach ($timetableLessons as $entity)
        {
            $keysLessons[] = $entity->getKey();
        }

        $collectionProblems = ProblemsManager::loadByLessonKeys($keysLessons);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'lessons' => $timetableLessons,
            'problems' => $collectionProblems,
            'statuses' => LessonsStatus::$list,
            'types' => LessonsTypes::$list,
        ]));

        return $response;
    }
}