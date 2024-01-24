<?php

namespace Liloi\TARDIS\API\Tickets\Edit;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Tickets\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyTicket = self::getParameter('key_ticket');
        $entity = Manager::load($keyTicket);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
        ]));

        return $response;
    }
}