<?php

namespace Liloi\Tardis\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    static ?Manager $manager = null;

    /**
     * Collect API methods.
     */
    public static function collect(): void
    {
        $manager = new Manager();

        $manager->add(new Method('Interstate60.Application.Plans.Collection', '\Liloi\Tardis\API\Application\Plans\Collection\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Plans.Show', '\Liloi\Tardis\API\Application\Plans\Show\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Plans.Edit', '\Liloi\Tardis\API\Application\Plans\Edit\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Plans.Save', '\Liloi\Tardis\API\Application\Plans\Save\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Plans.Create', '\Liloi\Tardis\API\Application\Plans\Create\Method::execute'));

        $manager->add(new Method('Interstate60.Application.Diary.Show', '\Liloi\Tardis\API\Application\Diary\Show\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Diary.Edit', '\Liloi\Tardis\API\Application\Diary\Edit\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Diary.Save', '\Liloi\Tardis\API\Application\Diary\Save\Method::execute'));
        $manager->add(new Method('Interstate60.Application.Diary.Create', '\Liloi\Tardis\API\Application\Diary\Create\Method::execute'));

        self::$manager = $manager;
    }

    /**
     * Execute one of the API methods.
     *
     * @return string
     * @throws \Liloi\API\Errors\NotFoundException
     */
    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }
}