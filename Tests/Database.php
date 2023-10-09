<?php

use Liloi\I60\API\Method;
use Liloi\I60\Domain\Manager;
use Liloi\Config\Pool;

class Database
{
    static private ?self $instance = null;

    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
            self::$instance->setConfig()->resetDatabase();
        }

        return self::$instance;
    }

    protected function setConfig(): self
    {
        include __DIR__ . '/../Config/Test.php';
        $pool = Pool::getSingleton();
        Manager::setConfig($pool);
        Method::setConfig($pool);
        return $this;
    }

    protected function resetDatabase(): self
    {
        $list_sql = explode(';', file_get_contents(__DIR__ . '/../Install/Install.sql'));

        foreach ($list_sql as $sql)
        {
            Manager::getAdapter()->request($sql);
        }

        return $this;
    }
}