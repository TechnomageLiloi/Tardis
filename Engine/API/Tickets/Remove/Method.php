<?php

namespace Liloi\TARDIS\API\Problems\Remove;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Problems\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Remove
 * @package Liloi\Blueprint\API\Blueprints\Remove
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_problem = self::getParameter('key_problem');
        $entity = Manager::load($key_problem);
        $entity->remove();

        return new Response();
    }
}