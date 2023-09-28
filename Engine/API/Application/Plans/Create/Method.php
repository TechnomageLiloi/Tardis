<?php

namespace Liloi\I60\API\Application\Plans\Create;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Plans\Manager as PlansManager;

/**
 * Rune API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        PlansManager::create();
        return new Response();
    }
}