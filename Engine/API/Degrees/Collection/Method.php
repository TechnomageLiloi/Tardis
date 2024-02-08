<?php

namespace Liloi\TARDIS\API\Degrees\Collection;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Degrees\Manager as DegreesManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = DegreesManager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}