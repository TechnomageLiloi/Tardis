<?php

namespace Liloi\Rune\API\Plan\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Plan\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_plan');
        $entity = Manager::load($key_problem);

        $entity->setPlan(self::getParameter('plan'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}