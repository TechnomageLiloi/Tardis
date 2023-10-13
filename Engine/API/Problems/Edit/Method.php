<?php

namespace Liloi\Blueprint\API\Problems\Edit;

use Liloi\API\Response;
use Liloi\Blueprint\API\Method as SuperMethod;
use Liloi\Blueprint\Engine\Domain\Problems\Manager;
use Liloi\Blueprint\Engine\Domain\Problems\Types;

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
            'uid' => $uid
        ]));

        return $response;
    }
}