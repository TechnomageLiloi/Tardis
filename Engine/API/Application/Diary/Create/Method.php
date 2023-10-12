<?php

namespace Liloi\Tardis\API\Application\Diary\Create;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Diary\Manager as DiaryManager;

/**
 * Rune API: Tardis.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        DiaryManager::create();
        return new Response();
    }
}