<?php

namespace Liloi\TARDIS\API\Lessons\Edit;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager;
use Liloi\TARDIS\Domain\Lessons\Status;
use Liloi\TARDIS\Domain\Lessons\Types;
use Liloi\TARDIS\Domain\Degrees\Manager as DegreeManager;

/**
 * TARDIS API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $listDegreeActive = DegreeManager::loadActiveKeyList();
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
            'degrees' => $listDegreeActive,
            'entity' => $entity,
            'statuses' => Status::$list,
            'types' => Types::$list,
        ]));

        return $response;
    }
}