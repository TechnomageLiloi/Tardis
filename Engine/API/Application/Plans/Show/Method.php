<?php

namespace Liloi\Tardis\API\Application\Plans\Show;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Plans\Manager as DiaryManager;

/**
 * Rune API: Tardis.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key = self::getParameter('key_plan');
        $entity = DiaryManager::load($key);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}