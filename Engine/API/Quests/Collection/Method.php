<?php

namespace Liloi\Rune\API\Quests\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Quests\Manager as QuestManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $quest = QuestManager::loadCurrent();
        $collection = QuestManager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'quest' => $quest
        ]));

        return $response;
    }
}