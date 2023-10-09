<?php

use Liloi\I60\API\Method;
use Liloi\I60\Domain\Manager;

class Database
{
    static private ?self $instance = null;

    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
            self::$instance->setConfig();
        }

        return self::$instance;
    }

    private function setConfig(): void
    {
        $config = include __DIR__ . '/../Config/Test.php';
        Manager::setConfig($config);
        Method::setConfig($config);
    }
}