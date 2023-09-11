<?php

namespace Liloi\I60\API\Application\Diary\Create;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Diary\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        DiaryManager::create();
        return new Response();
    }
}