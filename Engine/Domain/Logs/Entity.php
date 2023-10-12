<?php

namespace Liloi\Tardis\Domain\Logs;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_log');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function insert(): void
    {
        Manager::create($this);
    }
}