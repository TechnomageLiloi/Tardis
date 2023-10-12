<?php

namespace Liloi\Tardis\API\Application\Plans\Edit;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Plans\Manager as DiaryManager;
use Liloi\Tardis\Domain\Plans\Statuses as DiaryStatuses;

/**
 * Rune API: Tardis.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key = self::getParameter('key_plan');
        $entity = DiaryManager::load($key);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => DiaryStatuses::$list,
        ]));

        return $response;
    }
}