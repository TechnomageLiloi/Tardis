<?php

use Liloi\Tardis\API\Method;
use Liloi\Tardis\Domain\Manager;
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
        Manager::getAdapter()->request('SET foreign_key_checks = 0');

        if ($result = Manager::getAdapter()->request("SHOW TABLES"))
        {
            while ($row = $result->fetch_array(MYSQLI_NUM))
            {
                Manager::getAdapter()->request('DROP TABLE IF EXISTS ' . $row[0]);
            }
        }

        Manager::getAdapter()->request('SET foreign_key_checks = 1');

        $list_sql = explode(';', file_get_contents(__DIR__ . '/../Install/Install.sql'));

        foreach ($list_sql as $sql)
        {
            Manager::getAdapter()->request($sql);
        }

        return $this;
    }
}