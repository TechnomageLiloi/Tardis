<?php

namespace Liloi\Rune\API\Lessons\Schedule;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager as LessonsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $tsStart = date('Y-m-d 00:00:00', strtotime('monday this week'));
        $tsFinish = date('Y-m-d 23:59:59', strtotime('sunday this week'));

        $date_now = self::getParameter('date_now');
        $schedule = LessonsManager::schedule($date_now);
        $karma = LessonsManager::loadKarmaForPeriod($tsStart, $tsFinish);

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
            'karma' => $karma,
            'schedule' => $schedule,
        ]));

        return $response;
    }
}