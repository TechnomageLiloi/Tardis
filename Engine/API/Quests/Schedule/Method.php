<?php

namespace Liloi\Rune\API\Quests\Schedule;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Quests\Manager as LessonsManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $schedule = LessonsManager::schedule();

        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ];

        $dates = [];
        $i = 0;

        foreach (array_keys($days) as $day)
        {
            $dates[$day] = date('Y-m-d', strtotime("+$i days", strtotime('monday this week')));
            ++$i;
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'days' => $days,
            'karma' => 0,
            'schedule' => $schedule,
            'dates' => $dates
        ]));

        return $response;
    }
}