<?php

namespace Liloi\Tardis\Domain\Problems;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 * @method string getProgram()
 * @method void setProgram(string $value)
 * @method string getType()
 * @method void setType(string $value)
 * @method string getMark()
 * @method void setMark(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_problem');
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }
}