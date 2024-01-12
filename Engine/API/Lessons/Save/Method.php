<?php

namespace Liloi\Rune\API\Lessons\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;

/**
 * Rune API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_lesson = self::getParameter('key_lesson');
        $entity = Manager::load($key_lesson);

        $entity->setComment(self::getParameter('comment'));
        $entity->setMark(self::getParameter('mark'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setData(self::getParameter('data'));
        $entity->setKeyAtom(self::getParameter('key_atom'));
        $entity->setType(self::getParameter('type'));
        $entity->setTags(self::getParameter('tags'));

        $entity->save();

        return new Response();
    }
}