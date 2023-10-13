<?php

namespace Liloi\Tardis\Domain\Lessons;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getComment()
 * @method void setComment(string $value)
 *
 * @method string getMark()
 * @method void setMark(string $value)
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
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_lesson');
    }

    public function getDateNumber(): int
    {
        return (int)date('N', strtotime($this->getStart()));
    }

    public function getTime(): int
    {
        return (int)date('G', strtotime($this->getStart()));
    }

    public function getKeyProblem(): string
    {
        return $this->getField('key_problem');
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