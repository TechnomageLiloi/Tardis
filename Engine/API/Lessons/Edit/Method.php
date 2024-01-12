<?php

namespace Liloi\Rune\API\Lessons\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;
use Liloi\Rune\Domain\Lessons\Status;
use Liloi\Rune\Domain\Problems\Types;

/**
 * Rune API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_lesson = self::getParameter('key_lesson');

        if((int)$key_lesson)
        {
            $entity = Manager::load($key_lesson);
        }
        else
        {
            $entity = Manager::loadCurrent();
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Status::$list,
            'types' => Types::$list,
        ]));

        return $response;
    }
}