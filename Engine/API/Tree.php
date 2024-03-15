<?php

namespace Liloi\TARDIS\API;

use Liloi\API\Manager;
use Liloi\API\Method;
use Liloi\TARDIS\API\Method as TARDISMethod;

/**
 * @inheritDoc
 */
class Tree
{
    private static ?self $instance = null;

    private Manager $manager;

    private function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @obsolete It is centralized, which is incorrect.
     * @todo Add general API Pool.
     * @return static
     */
    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('TARDIS.Plan.Show', '\Liloi\TARDIS\API\Plan\Show\Method::execute'));

            $manager->add(new Method('TARDIS.Degrees.Collection', '\Liloi\TARDIS\API\Degrees\Collection\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Show', '\Liloi\TARDIS\API\Degrees\Show\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Create', '\Liloi\TARDIS\API\Degrees\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Remove', '\Liloi\TARDIS\API\Degrees\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Edit', '\Liloi\TARDIS\API\Degrees\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Save', '\Liloi\TARDIS\API\Degrees\Save\Method::execute'));

            $manager->add(new Method('TARDIS.Lessons.Create', '\Liloi\TARDIS\API\Lessons\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Edit', '\Liloi\TARDIS\API\Lessons\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Save', '\Liloi\TARDIS\API\Lessons\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Show', '\Liloi\TARDIS\API\Lessons\Show\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Remove', '\Liloi\TARDIS\API\Lessons\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Schedule', '\Liloi\TARDIS\API\Lessons\Schedule\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Timetable', '\Liloi\TARDIS\API\Lessons\Timetable\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Update', '\Liloi\TARDIS\API\Lessons\Update\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Calculate', '\Liloi\TARDIS\API\Lessons\Calculate\Method::execute'));

            $manager->add(new Method('TARDIS.Problems.Create', '\Liloi\TARDIS\API\Problems\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Problems.Remove', '\Liloi\TARDIS\API\Problems\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Problems.Edit', '\Liloi\TARDIS\API\Problems\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Problems.Save', '\Liloi\TARDIS\API\Problems\Save\Method::execute'));

            $manager->add(new Method('TARDIS.Tickets.Create', '\Liloi\TARDIS\API\Tickets\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Tickets.Remove', '\Liloi\TARDIS\API\Tickets\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Tickets.Edit', '\Liloi\TARDIS\API\Tickets\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Tickets.Save', '\Liloi\TARDIS\API\Tickets\Save\Method::execute'));

            $manager->add(new Method('TARDIS.Quests.Create', '\Liloi\TARDIS\API\Quests\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Remove', '\Liloi\TARDIS\API\Quests\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Edit', '\Liloi\TARDIS\API\Quests\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Save', '\Liloi\TARDIS\API\Quests\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Done', '\Liloi\TARDIS\API\Quests\Done\Method::execute'));

            $manager->add(new Method('TARDIS.Horcruxes.Create', '\Liloi\TARDIS\API\Horcruxes\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Remove', '\Liloi\TARDIS\API\Horcruxes\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Edit', '\Liloi\TARDIS\API\Horcruxes\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Save', '\Liloi\TARDIS\API\Horcruxes\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Done', '\Liloi\TARDIS\API\Horcruxes\Done\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        // @todo: add dynamic API search (by namespace).
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }

    /**
     * Get API manager.
     *
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }
}