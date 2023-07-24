<?php

namespace Liloi\I60;

use Liloi\Config\Pool;
use Rune\Application\Conceptual as ConceptualApplication;
use Liloi\I60\API\Tree;
use Liloi\I60\Domain\Manager;
use Liloi\I60\API\Method;

/**
 * @inheritDoc
 */
class Application extends ConceptualApplication
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    private Pool $config;

    /**
     * Application constructor.
     *
     * @param Pool $config Configuration data object.
     */
    public function __construct(Pool $config)
    {
        $this->config = $config;
        Manager::setConfig($config);
        Method::setConfig($config);
    }

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public function getConfig(): Pool
    {
        return $this->config;
    }

    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        // If API requested.
        if(isset($_POST['method']))
        {
            // @todo: add chain method.
            Tree::collect();
            return Tree::execute();
        }

        return $this->render(__DIR__ . '/Layout.tpl', [

        ]);
    }
}