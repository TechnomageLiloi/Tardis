<?php

namespace Liloi\TARDIS\API\Lessons\Calculate;

use Liloi\API\Response;
use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Lessons\Manager;

// @obsolete: Should remove in the next version.
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        return new Response();
    }
}