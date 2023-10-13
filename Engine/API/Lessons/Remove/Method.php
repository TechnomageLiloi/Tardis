<?php

namespace Liloi\Tardis\API\Lessons\Remove;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Lessons\Manager;

/**
 * Rune API: Blueprint.Blueprints.Remove
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