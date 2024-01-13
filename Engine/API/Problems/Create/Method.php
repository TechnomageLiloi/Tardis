<?php

namespace Liloi\TARDIS\API\Problems\Create;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Problems\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $keyLesson = self::getParameter('key_lesson');
        Manager::create($keyLesson);
        return new Response();
    }
}