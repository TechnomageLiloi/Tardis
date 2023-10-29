<?php

namespace Liloi\Tardis\API\Lessons\Update;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Lessons\Manager;
use Liloi\Tardis\Domain\Lessons\Status;

/**
 * Rune API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_lesson = self::getParameter('key_lesson');

        $entity = Manager::load($key_lesson);
        $entity->setStart(date('Y-m-d H:i:s'));
        $entity->setStatus(Status::IN_HAND);
        $entity->save();

        return new Response();
    }
}