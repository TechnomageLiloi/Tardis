<?php

namespace Liloi\TARDIS\API\Degrees\Save;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Degrees\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $entity = Manager::loadByKey(self::getParameter('key'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setUid(self::getParameter('uid'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}