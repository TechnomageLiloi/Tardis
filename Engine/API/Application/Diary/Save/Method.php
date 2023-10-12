<?php

namespace Liloi\Tardis\API\Application\Diary\Save;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Diary\Manager as DiaryManager;

/**
 * Rune API: Tardis.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = DiaryManager::loadCurrent();

        $entity->setData(self::getParameter('data'));
        $entity->setFinish(date('Y-m-d H:i:s'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setTitle(self::getParameter('title'));
        $entity->setType(self::getParameter('type'));

        $entity->save();

        return new Response();
    }
}