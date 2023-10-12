<?php

namespace Liloi\Tardis\API\Application\Diary\Edit;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Diary\Manager as DiaryManager;
use Liloi\Tardis\Domain\Diary\Statuses as DiaryStatuses;
use Liloi\Tardis\Domain\Diary\Types as DiaryTypes;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = DiaryManager::loadCurrent();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => DiaryStatuses::$list,
            'types' => DiaryTypes::$list,
        ]));

        return $response;
    }
}