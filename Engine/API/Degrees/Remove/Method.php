<?php

namespace Liloi\Tardis\API\Degrees\Remove;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Degrees\Manager;

/**
 * Rune API: Blueprint.Blueprints.Remove
 * @package Liloi\Blueprint\API\Blueprints\Remove
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $uid = self::getParameter('uid');
        $entity = Manager::load($uid);
        $entity->remove();

        return new Response();
    }
}