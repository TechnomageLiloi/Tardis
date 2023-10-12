<?php

namespace Liloi\Tardis\API\Application\Plans\Save;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Plans\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key = self::getParameter('key_plan');
        $entity = DiaryManager::load($key);

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}