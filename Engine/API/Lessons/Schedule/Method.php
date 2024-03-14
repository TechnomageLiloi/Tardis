<?php

namespace Liloi\TARDIS\API\Lessons\Schedule;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager as LessonsManager;
use Liloi\TARDIS\Domain\Lessons\Positions as LessonsPositions;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $date_now = self::getParameter('date_now');
        $schedule = LessonsManager::schedule($date_now);

        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ];

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'days' => $days,
            'karma' => 0,
            'schedule' => $schedule,
            'positions' => LessonsPositions::$list
        ]));

        return $response;
    }
}