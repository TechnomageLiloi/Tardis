<?php

namespace Liloi\Tardis\API;

use Liloi\Config\Pool;
use Liloi\Judex\Assert;
use Liloi\API\Response;

abstract class Method
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    static private Pool $config;

    /**
     * @return Response
     */
    abstract static public function execute(): Response;

    /**
     * Get parameter value by name.
     *
     * @param string $name Parameter name.
     * @return mixed Parameter value.
     */
    public static function getParameter(string $name)
    {
        $parameters = self::getParameters();

        Assert::true(isset($parameters[$name]), 'Parameter name is not found.', [
            'parameters' => $parameters,
            'name' => $name
        ]);

        return $parameters[$name];
    }

    /**
     * Get all list of API parameters.
     *
     * @return array List of API parameters.
     */
    public static function getParameters(): array
    {
        return $_POST['parameters'];
    }

    /**
     * Render template.
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    protected static function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public static function getConfig(): Pool
    {
        return static::$config;
    }

    /**
     * Sets configuration data object.
     * @param Pool $config
     */
    public static function setConfig(Pool $config): void
    {
        static::$config = $config;
    }
}