<?php

namespace Liloi\Tardis\API\Problems\Edit;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Problems\Manager;
use Liloi\Tardis\Domain\Problems\Types;
use Liloi\Tardis\Domain\Problems\Statuses;

/**
 * Rune API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $uid = self::getParameter('uid');
        $key_problem = self::getParameter('key_problem');
        $entity = Manager::load($key_problem);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => Types::$list,
            'statuses' => Statuses::$list,
            'uid' => $uid
        ]));

        return $response;
    }
}