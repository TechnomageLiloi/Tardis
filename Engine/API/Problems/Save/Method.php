<?php

namespace Liloi\TARDIS\API\Problems\Save;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Problems\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_problem');
        $entity = Manager::load($key_problem);

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setSummary(self::getParameter('summary'));

        $entity->save();

        return new Response();
    }
}