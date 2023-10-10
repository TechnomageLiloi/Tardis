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
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_day');
    }

    public function getID(): string
    {
        $key = str_pad($this->getKey(), 14, '0', STR_PAD_LEFT);

        return sprintf(
            '%s-%s-%s-%s-%s-%s-%s',
            $key[0] . $key[1],
            $key[2] . $key[3],
            $key[4] . $key[5],
            $key[6] . $key[7],
            $key[8] . $key[9],
            $key[10] . $key[11],
            $key[12] . $key[13]
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

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getPeriod(): int
    {
        $unixStart = strtotime($this->getStart());
        $unixFinish = strtotime($this->getFinish());

        return (int)(($unixFinish - $unixStart) / 900);
    }
}