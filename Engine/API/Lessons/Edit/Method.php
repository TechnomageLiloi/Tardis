<?php

namespace Liloi\Tardis\API\Lessons\Edit;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Lessons\Manager;
use Liloi\Tardis\Domain\Lessons\Status;

/**
 * Rune API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_lesson = self::getParameter('key_lesson');
        $entity = Manager::load($key_lesson);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Status::$list
        ]));

        return $response;
    }
}