<?php

namespace Liloi\I60\API\Application\Diary\Show;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Diary\Manager as DiaryManager;
use Liloi\I60\Domain\Tickets\Manager as TicketsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_day = self::getParameter('key_day');

        $entity = DiaryManager::load($key_day);

        $listTickets = TicketsManager::loadPeriod($key_day . ' 00:00:00', $key_day . ' 23:59:59');

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'listTickets' => $listTickets
        ]));

        return $response;
    }
}