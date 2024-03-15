<?php

namespace Liloi\TARDIS\API\Lessons\Show;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Config\Manager as ConfigManager;
use Liloi\TARDIS\Domain\Config\Keys as ConfigKeys;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_date = self::getParameter('key_date');
        $key_position = self::getParameter('key_position');

        ConfigManager::load(ConfigKeys::CURRENT_DATE)->setString($key_date)->save();
        ConfigManager::load(ConfigKeys::CURRENT_POSITION)->setString($key_position)->save();

        return new Response();
    }
}