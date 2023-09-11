<?php

namespace Liloi\I60\API\Application\Diary\Edit;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Diary\Manager as DiaryManager;
use Liloi\I60\Domain\Diary\Statuses as DiaryStatuses;

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
        ]));

        return $response;
    }
}