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
use Liloi\TARDIS\Domain\Horcruxes\Manager as HorcruxesManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $quest = QuestsManager::loadCurrent();
        $horcrux = HorcruxesManager::loadCurrent();
        $listDegreeActive = DegreeManager::loadActiveKeyList();
        $timetable = LessonsManager::loadTimetable();
        $totalKarma = TicketsManager::loadKarma();

        $collectionProblems = ProblemsManager::loadByDegreeKeys(array_keys($listDegreeActive));
//        $collectionTickets = TicketsManager::loadByLessonKeys($keysLessons);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'degrees' => $listDegreeActive,
            'timetable' => $timetable,
            'tickets' => [],
            'problems' => $collectionProblems,
            'statuses' => LessonsStatus::$list,
            'problemStatuses' => ProblemsStatuses::$list,
            'types' => LessonsTypes::$list,
            'total' => $totalKarma,
            'quest' => $quest,
            'horcrux' => $horcrux
        ]));

        return $response;
    }
}