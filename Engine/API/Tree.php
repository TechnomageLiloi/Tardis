<?php

namespace Liloi\Rune\API;

use Liloi\API\Manager;
use Liloi\API\Method;
use Liloi\Rune\API\Method as RuneMethod;

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

            $manager->add(new Method('TARDIS.Quests.Collection', '\Liloi\Rune\API\Quests\Collection\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Create', '\Liloi\Rune\API\Quests\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Remove', '\Liloi\Rune\API\Quests\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Edit', '\Liloi\Rune\API\Quests\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Save', '\Liloi\Rune\API\Quests\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Done', '\Liloi\Rune\API\Quests\Done\Method::execute'));
            $manager->add(new Method('Artifact.Quests.Schedule', '\Liloi\Rune\API\Quests\Schedule\Method::execute'));

            $manager->add(new Method('Interstate60.Plan.Show', '\Liloi\Rune\API\Plan\Show\Method::execute'));
            $manager->add(new Method('Interstate60.Plan.Edit', '\Liloi\Rune\API\Plan\Edit\Method::execute'));
            $manager->add(new Method('Interstate60.Plan.Save', '\Liloi\Rune\API\Plan\Save\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        // @todo: optimize

//        if(strpos($_POST['method'], 'Rune.User.') !== false)
//        {
//            return $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? [])->asJson();
//        }
//
//        if(strpos($_POST['method'], 'Rune.Security.') === false)
//        {
//            RuneMethod::accessCheck();
//        }

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