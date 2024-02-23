<?php

namespace Liloi\TARDIS\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Entity as LessonsEntity;
use Liloi\TARDIS\Domain\Lessons\Manager as LessonsManager;
use Liloi\TARDIS\Domain\Lessons\Status as LessonsStatus;
use Liloi\TARDIS\Domain\Lessons\Types as LessonsTypes;
use Liloi\TARDIS\Domain\Problems\Manager as ProblemsManager;
use Liloi\TARDIS\Domain\Problems\Statuses as ProblemsStatuses;
use Liloi\TARDIS\Domain\Tickets\Manager as TicketsManager;
use Liloi\TARDIS\Domain\Degrees\Manager as DegreeManager;
use Liloi\TARDIS\Domain\Quests\Manager as QuestsManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $quest = QuestsManager::loadCurrent();
        $listDegreeActive = DegreeManager::loadActiveKeyList();
        $timetableLessons = LessonsManager::loadTimetable(array_keys($listDegreeActive));

        $keysLessons = [];
        $totalKarma = TicketsManager::loadKarma();

        /** @var LessonsEntity $entity */
        foreach ($timetableLessons as $entity)
        {
            $keysLessons[] = $entity->getKey();
        }

        $collectionProblems = ProblemsManager::loadByDegreeKeys(array_keys($listDegreeActive));
        $collectionTickets = TicketsManager::loadByLessonKeys($keysLessons);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'degrees' => $listDegreeActive,
            'lessons' => $timetableLessons,
            'tickets' => $collectionTickets,
            'problems' => $collectionProblems,
            'statuses' => LessonsStatus::$list,
            'problemStatuses' => ProblemsStatuses::$list,
            'types' => LessonsTypes::$list,
            'total' => $totalKarma,
            'quest' => $quest
        ]));

        return $response;
    }
}