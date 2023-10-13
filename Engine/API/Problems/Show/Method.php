<?php

namespace Liloi\Tardis\API\Problems\Show;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Problems\Manager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_problem');
        $entity = Manager::load($key_problem);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}