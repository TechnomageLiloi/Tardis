<?php

namespace Liloi\I60\Domain\Diary;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_day');
    }

    public function getID(): string
    {
        $key = (int)$this->getKey();

        // @todo: increase id to 7
        $id2 = (int)($key / 100);
        $id1 = $key % 100;

        return sprintf(
            '00-00-00-00-00-%s-%s',
            str_pad($id2, 2, '0', STR_PAD_LEFT),
            str_pad($id1, 2, '0', STR_PAD_LEFT)
        );
    }

    public function parse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function save(): void
    {
        Manager::save($this);
    }
}