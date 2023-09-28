<?php

namespace Liloi\I60\API\Application\Plans\Save;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Plans\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = DiaryManager::loadCurrent();

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}