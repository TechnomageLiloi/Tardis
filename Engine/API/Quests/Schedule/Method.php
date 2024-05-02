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

        $names = [
            0 => 'Midnight lesson',
            1 => 'Lesson #1',
            2 => 'Lesson #2',
            3 => 'Lesson #3',
            4 => 'Lesson #4',
            5 => 'Lesson #5',
            6 => 'Lesson #6',
            7 => 'Lesson #7',
            8 => 'Lesson #8',
            9 => 'Lesson #9',
            10 => 'Lesson #10',
            11 => 'Lesson #11',
            12 => 'Midday lesson',
            13 => 'Lesson #13',
            14 => 'Lesson #14',
            15 => 'Lesson #15',
            16 => 'Lesson #16',
            17 => 'Lesson #17',
            18 => 'Lesson #18',
            19 => 'Lesson #19',
            20 => 'Lesson #20',
            21 => 'Lesson #21',
            22 => 'Sleeping lesson',
            23 => 'Strong sleeping lesson',
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
            'dates' => $dates,
            'names' => $names
        ]));

        return $response;
    }
}