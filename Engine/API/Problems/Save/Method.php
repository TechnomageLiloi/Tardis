<?php

namespace Liloi\Tardis\API\Problems\Save;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Problems\Manager;

/**
 * Rune API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_problem');
        $entity = Manager::load($key_problem);

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setType(self::getParameter('type'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setMark(self::getParameter('mark'));

        $entity->save();

        return new Response();
    }
}