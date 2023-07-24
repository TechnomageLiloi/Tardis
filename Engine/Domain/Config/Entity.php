<?php

namespace Liloi\I60\Domain\Config;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getParam()
 * @method void setParam(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_config');
    }

    public function getString(): string
    {
        $param = (array)json_decode($this->getParam(), true);
        return (string)$param['string'];
    }

    public function setString(string $value): self
    {
        $this->setParam(json_encode(['string' => $value]));
        return $this;
    }

    public function save(): void
    {
        Manager::save($this);
    }
}