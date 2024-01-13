<?php

namespace Liloi\TARDIS\API\Lessons\Update;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager;
use Liloi\TARDIS\Domain\Lessons\Status;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_lesson = self::getParameter('key_lesson');

        $entity = Manager::load($key_lesson);
        $entity->setStart(date('Y-m-d H:i:s'));
        $entity->save();

        return new Response();
    }
}