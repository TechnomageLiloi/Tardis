<?php

namespace Liloi\TARDIS\API\Degrees\Edit;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Degrees\Manager;
use Liloi\TARDIS\Domain\Degrees\Statuses;

/**
 * TARDIS API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $uid = self::getParameter('uid');
        $entity = Manager::load($uid);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Statuses::$list
        ]));

        return $response;
    }
}