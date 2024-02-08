<?php

namespace Liloi\TARDIS\API\Plan\Show;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;

/**
 * Rune API: Rune.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [

        ]));

        return $response;
    }
}