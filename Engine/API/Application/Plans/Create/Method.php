<?php

namespace Liloi\Tardis\API\Application\Plans\Create;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Plans\Manager as PlansManager;

/**
 * Rune API: Tardis.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        PlansManager::create();
        return new Response();
    }
}