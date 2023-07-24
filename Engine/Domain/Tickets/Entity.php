<?php

namespace Liloi\I60\Domain\Tickets;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getLink()
 * @method void setLink(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getDifficulty()
 * @method void setDifficulty(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_ticket');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getDifficultyTitle(): string
    {
        return Difficulties::$list[$this->getDifficulty()];
    }

    public function getPeriod(): string
    {
        $start = $this->getStart();
        $formatStart = (is_null($start) || $start === '0000-00-00 00:00:00') ? '* [*' : date('Y-m-d [H:i', strtotime($start));

        $finish = $this->getFinish();
        $formatFinish = (is_null($finish) || $finish === '0000-00-00 00:00:00') ? '*]' : date('H:i]', strtotime($finish));

        return sprintf('%s-%s', $formatStart, $formatFinish);
    }

    public function parse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    /**
     * Is problem of ticket solved?
     *
     * @return bool
     */
    public function isDone(): bool
    {
        return in_array($this->getStatus(), [Statuses::COMPLETED, Statuses::ARCHIVE, Statuses::CANCEL]);
    }

    /**
     * Is mark applied?
     *
     * @return bool
     */
    public function isMarkApplied(): bool
    {
        return in_array($this->getStatus(), [Statuses::COMPLETED, Statuses::ARCHIVE]);
    }

    /**
     * Get mark of ticket.
     *
     * @return int
     */
    public function getMark(): int
    {
        return Difficulties::$marks[$this->getDifficulty()];
    }
}