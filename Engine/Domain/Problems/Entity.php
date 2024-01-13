<?php

namespace Liloi\TARDIS\Domain\Problems;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * Problems entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Get problem key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_problem');
    }

    /**
     * Get lesson key.
     *
     * @return string
     */
    public function getKeyLesson(): string
    {
        return $this->getField('key_lesson');
    }

    /**
     * Save problem to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Remove problem from database.
     */
    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }
}