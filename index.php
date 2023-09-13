<?php

define('ROOT_DIR', __DIR__);

session_start();
include_once __DIR__ . '/vendor/autoload.php';

use Liloi\Judex\Log;
use Liloi\Judex\LogData;
use Liloi\I60\Domain\Logs\Entity;
use Liloi\Judex\Exceptions\JudexException;

Log::set('log', function (LogData $data) {
    $entity = Entity::create([
        'title' => $data->getMessage(),
        'data' => json_encode($data->getData(), JSON_UNESCAPED_UNICODE)
    ]);
    $entity->insert();
});

try {
    $config = include __DIR__ . '/Config/Block.php';
    echo (new Liloi\I60\Application($config))->compile();
}
catch (JudexException $exp)
{
    Log::call(
        $exp->getMessage(),
        'judex exception',
        [
            'class' => get_class($exp),
            'trace' => $exp->getTrace(),
            'code' => $exp->getCode(),
            'file' => $exp->getFile(),
            'line' => $exp->getLine()
        ]
    );
}
catch (Throwable $exp)
{
    Log::call(
        $exp->getMessage(),
        'not judex exception',
        [
            'class' => get_class($exp),
            'trace' => $exp->getTrace(),
            'code' => $exp->getCode(),
            'file' => $exp->getFile(),
            'line' => $exp->getLine()
        ]
    );
}