<?php

namespace Liloi\Tardis\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Lessons\Manager;
use Liloi\Tardis\Domain\Lessons\Status;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = Manager::loadTimetable();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'statuses' => Status::$list
        ]));

        return $response;
    }
}