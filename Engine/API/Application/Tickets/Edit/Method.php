<?php

namespace Liloi\I60\API\Application\Tickets\Edit;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Tickets\Manager as TicketsManager;
use Liloi\I60\Domain\Tickets\Statuses as TicketsStatuses;
use Liloi\I60\Domain\Tickets\Difficulties as TicketsDifficulties;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_ticket = self::getParameter('key_ticket');
        $entity = TicketsManager::load($key_ticket);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => TicketsStatuses::$list,
            'difficulties' => TicketsDifficulties::$list
        ]));

        return $response;
    }
}