<?php

namespace Liloi\Tardis\API\Lessons\Schedule;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Lessons\Manager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $date_now = self::getParameter('date_now');
        $schedule = Manager::schedule($date_now);

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
            'schedule' => $schedule,
            'days' => $days
        ]));

        return $response;
    }
}