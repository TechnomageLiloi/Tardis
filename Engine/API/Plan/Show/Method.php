<?php

namespace Liloi\TARDIS\API\Plan\Show;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Degrees\Manager as DegreesManager;

/**
 * Rune API: Rune.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = DegreesManager::loadCollection('key_degree asc');

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}