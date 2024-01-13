<?php

namespace Liloi\TARDIS\API\Lessons\Create;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Atoms\Manager as AtomsManager;
use Liloi\TARDIS\Domain\Lessons\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $keyAtom = AtomsManager::URLtoATOM($URL);

        Manager::create($keyAtom);
        return new Response();
    }
}