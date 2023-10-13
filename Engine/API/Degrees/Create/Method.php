<?php

namespace Liloi\Tardis\API\Degrees\Create;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Blueprint\Engine\Domain\Blueprints\Manager;

/**
 * Rune API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $uid = self::getParameter('uid');
        Manager::create($uid);
        return new Response();
    }
}