<?php

namespace Liloi\I60\API\Application\Plans\Collection;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Plans\Manager as PlansManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = PlansManager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}