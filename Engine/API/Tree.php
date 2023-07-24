<?php

namespace Liloi\I60\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    static ?Manager $manager = null;

    public static function collect(): void
    {
        $manager = new Manager();

        $manager->add(new Method('Interstate60.Application.Diary.Show', '\Liloi\I60\API\Application\Diary\Show\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Diary.Edit', '\Liloi\I60\API\Application\Diary\Edit\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Diary.Save', '\Liloi\I60\API\Application\Diary\Save\Method::execute'));

        $manager->add(new Method('Interstate60.Application.Tickets.Collection', '\Liloi\I60\API\Application\Tickets\Collection\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Tickets.Create', '\Liloi\I60\API\Application\Tickets\Create\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Tickets.Edit', '\Liloi\I60\API\Application\Tickets\Edit\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Tickets.Save', '\Liloi\I60\API\Application\Tickets\Save\Method::execute'));

        self::$manager = $manager;
    }

    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }
}