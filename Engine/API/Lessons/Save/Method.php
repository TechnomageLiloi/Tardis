<?php

namespace Liloi\TARDIS\API\Lessons\Save;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_lesson = self::getParameter('key_lesson');
        $entity = Manager::load($key_lesson);

        $entity->setKeyDegree(self::getParameter('degree'));
        $entity->setComment(self::getParameter('comment'));
        $entity->setMark(self::getParameter('mark'));
        $entity->setStart(self::getParameter('start'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setData(self::getParameter('data'));
        $entity->setType(self::getParameter('type'));

        $entity->save();

        return new Response();
    }
}