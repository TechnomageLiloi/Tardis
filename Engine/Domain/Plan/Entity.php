<?php

namespace Liloi\Rune\Domain\Plan;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Plan entity.
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getPlan()
 * @method void setPlan(string $value)
 *
 * @method string getGoal()
 * @method void setGoal(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Gets quest key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_plan');
    }

    /**
     * Saves quest to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Removes quest from database.
     */
    public function remove(): void
    {
        Manager::remove($this);
    }

    /**
     * Gets quest status title.
     */
    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function parsePlan(): string
    {
        return Parser::parseString($this->getPlan());
    }

    public function getDone(): bool
    {
        return $this->getStatus() == Statuses::DONE;
    }
}