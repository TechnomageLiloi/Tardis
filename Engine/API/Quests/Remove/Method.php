<?php

namespace Liloi\TARDIS\API\Quests\Remove;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Quests\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Remove
 * @package Liloi\Blueprint\API\Blueprints\Remove
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_problem = self::getParameter('key_quest');
        $entity = Manager::load($key_problem);
        $entity->remove();

        return new Response();
    }
}