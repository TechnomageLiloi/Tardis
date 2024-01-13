<?php

namespace Liloi\TARDIS\API\Degrees\Create;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Degrees\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();
        return new Response();
    }
}