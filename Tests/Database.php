<?php

class Database
{
    static private ?self $instance = null;

    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}