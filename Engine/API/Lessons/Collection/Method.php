<?php

namespace Liloi\Tardis\API\Lessons\Collection;

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
        $key_problem = self::getParameter('key_problem');
        $collection = Manager::loadCollection($key_problem);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'key_problem' => $key_problem,
            'statuses' => Status::$list
        ]));

        return $response;
    }
}