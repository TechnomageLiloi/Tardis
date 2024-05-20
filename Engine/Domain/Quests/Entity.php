<?php

namespace Liloi\Rune\Domain\Quests;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Quest entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getKarma()
 * @method void setKarma(string $value)
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
        return $this->getField('key_quest');
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

    /**
     * Gets quest type title.
     */
    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    /**
     * Stylo parse of summary.
     *
     * @return string
     */
    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function getDateNumber(): int
    {
        return (int)gmdate('N', strtotime($this->getStart()));
    }

    public function getTime(): int
    {
        return (int)gmdate('G', strtotime($this->getStart()));
    }

    /**
     * Gets artifact status class.
     *
     * @return string
     */
    public function getStatusClass(): string
    {
        return Statuses::getClass($this->getStatus());
    }
}