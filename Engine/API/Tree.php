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

        $manager->add(new Method('Tardis.Application.Plans.Collection', '\Liloi\Tardis\API\Application\Plans\Collection\Method::execute'));
        $manager->add(new Method('Tardis.Application.Plans.Show', '\Liloi\Tardis\API\Application\Plans\Show\Method::execute'));
        $manager->add(new Method('Tardis.Application.Plans.Edit', '\Liloi\Tardis\API\Application\Plans\Edit\Method::execute'));
        $manager->add(new Method('Tardis.Application.Plans.Save', '\Liloi\Tardis\API\Application\Plans\Save\Method::execute'));
        $manager->add(new Method('Tardis.Application.Plans.Create', '\Liloi\Tardis\API\Application\Plans\Create\Method::execute'));

        $manager->add(new Method('Tardis.Application.Diary.Show', '\Liloi\Tardis\API\Application\Diary\Show\Method::execute'));
        $manager->add(new Method('Tardis.Application.Diary.Edit', '\Liloi\Tardis\API\Application\Diary\Edit\Method::execute'));
        $manager->add(new Method('Tardis.Application.Diary.Save', '\Liloi\Tardis\API\Application\Diary\Save\Method::execute'));
        $manager->add(new Method('Tardis.Application.Diary.Create', '\Liloi\Tardis\API\Application\Diary\Create\Method::execute'));

        $manager->add(new Method('Tardis.Degrees.Collection', '\Liloi\Tardis\API\Degrees\Collection\Method::execute'));
        $manager->add(new Method('Tardis.Degrees.Show', '\Liloi\Tardis\API\Degrees\Show\Method::execute'));
        $manager->add(new Method('Tardis.Degrees.Create', '\Liloi\Tardis\API\Degrees\Create\Method::execute'));
        $manager->add(new Method('Tardis.Degrees.Remove', '\Liloi\Tardis\API\Degrees\Remove\Method::execute'));
        $manager->add(new Method('Tardis.Degrees.Edit', '\Liloi\Tardis\API\Degrees\Edit\Method::execute'));
        $manager->add(new Method('Tardis.Degrees.Save', '\Liloi\Tardis\API\Degrees\Save\Method::execute'));

        $manager->add(new Method('Tardis.Lessons.Collection', '\Liloi\Tardis\API\Lessons\Collection\Method::execute'));
        $manager->add(new Method('Tardis.Lessons.Create', '\Liloi\Tardis\API\Lessons\Create\Method::execute'));
        $manager->add(new Method('Tardis.Lessons.Edit', '\Liloi\Tardis\API\Lessons\Edit\Method::execute'));
        $manager->add(new Method('Tardis.Lessons.Save', '\Liloi\Tardis\API\Lessons\Save\Method::execute'));
        $manager->add(new Method('Tardis.Lessons.Remove', '\Liloi\Tardis\API\Lessons\Remove\Method::execute'));
        $manager->add(new Method('Tardis.Lessons.Schedule', '\Liloi\Tardis\API\Lessons\Schedule\Method::execute'));

        $manager->add(new Method('Tardis.Problems.Collection', '\Liloi\Tardis\API\Problems\Collection\Method::execute'));
        $manager->add(new Method('Tardis.Problems.Create', '\Liloi\Tardis\API\Problems\Create\Method::execute'));
        $manager->add(new Method('Tardis.Problems.Remove', '\Liloi\Tardis\API\Problems\Remove\Method::execute'));
        $manager->add(new Method('Tardis.Problems.Edit', '\Liloi\Tardis\API\Problems\Edit\Method::execute'));
        $manager->add(new Method('Tardis.Problems.Save', '\Liloi\Tardis\API\Problems\Save\Method::execute'));
        $manager->add(new Method('Tardis.Problems.Show', '\Liloi\Tardis\API\Problems\Show\Method::execute'));

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