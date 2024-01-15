<?php

namespace Liloi\TARDIS\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Entity as LessonsEntity;
use Liloi\TARDIS\Domain\Lessons\Manager as LessonsManager;
use Liloi\TARDIS\Domain\Lessons\Status as LessonsStatus;
use Liloi\TARDIS\Domain\Lessons\Types as LessonsTypes;
use Liloi\TARDIS\Domain\Problems\Manager as ProblemsManager;
use Liloi\TARDIS\Domain\Degrees\Manager as DegreeManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $listDegreeActive = DegreeManager::loadActiveKeyList();
        $timetableLessons = LessonsManager::loadTimetable(array_keys($listDegreeActive));

        $keysLessons = [];
        $markSum = 0;

        /** @var LessonsEntity $entity */
        foreach ($timetableLessons as $entity)
        {
            $keysLessons[] = $entity->getKey();
            $markSum += (int)$entity->getMark();
        }

        $collectionProblems = ProblemsManager::loadByLessonKeys($keysLessons);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'degrees' => $listDegreeActive,
            'lessons' => $timetableLessons,
            'problems' => $collectionProblems,
            'statuses' => LessonsStatus::$list,
            'types' => LessonsTypes::$list,
            'total' => round($markSum / 7, 3, PHP_ROUND_HALF_DOWN)
        ]));

        return $response;
    }
}