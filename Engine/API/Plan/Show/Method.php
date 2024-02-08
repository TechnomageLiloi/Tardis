<?php

namespace Liloi\TARDIS\API\Plan\Show;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Degrees\Manager as DegreesManager;
use Liloi\TARDIS\Domain\Problems\Manager as ProblemsManager;

/**
 * Rune API: Rune.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $listDegreeActive = DegreesManager::loadActiveKeyList();
        $collectionDegrees = DegreesManager::loadCollection('key_degree asc');
        $collectionProblems = ProblemsManager::loadByDegreeKeys(array_keys($listDegreeActive));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'degrees' => $collectionDegrees,
            'problems' => $collectionProblems,
        ]));

        return $response;
    }
}