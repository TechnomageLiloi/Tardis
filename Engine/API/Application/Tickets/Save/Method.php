<?php

namespace Liloi\I60\API\Application\Tickets\Save;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Tickets\Manager as TicketsManager;

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

        $entity->setTitle(self::getParameter('title'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setLink(self::getParameter('link'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setDifficulty(self::getParameter('difficulty'));
        $entity->setProgram(self::getParameter('program'));

        $entity->save();

        return new Response();
    }
}