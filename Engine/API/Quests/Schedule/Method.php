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
            1 => 'Darkness lesson',
            2 => 'Witches lesson',
            3 => 'Coven lesson',
            4 => 'Lesson of Wolf',
            5 => 'Dawn lesson',
            6 => 'Biotech first lesson',
            7 => 'Biotech second lesson',
            8 => 'Biotech third lesson',
            9 => 'Motion first lesson',
            10 => 'Motion second lesson',
            11 => 'Motion third lesson',
            12 => 'Midday lesson',
            13 => 'Artifact lesson #1',
            14 => 'Artifact lesson #2',
            15 => 'Artifact lesson #3',
            16 => 'Artifact lesson #4',
            17 => 'Artifact lesson #5',
            18 => 'Artifact lesson #6',
            19 => 'Artifact lesson #7',
            20 => 'Artifact lesson #8',
            21 => 'Lesson of rest',
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