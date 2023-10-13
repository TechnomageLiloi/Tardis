<?php

namespace Liloi\Tardis\API\Problems\Remove;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Problems\Manager;

/**
 * Rune API: Blueprint.Blueprints.Remove
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