<?php

namespace Liloi\TARDIS\API\Lessons\Remove;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Remove
 * @package Liloi\Blueprint\API\Blueprints\Remove
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_lesson = self::getParameter('key_lesson');
        $entity = Manager::load($key_lesson);
        $entity->remove();

        return new Response();
    }
}