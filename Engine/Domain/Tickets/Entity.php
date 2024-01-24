<?php

namespace Liloi\TARDIS\Domain\Tickets;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * Tickets entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getPower()
 * @method void setPower(string $value)
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
        return $this->getField('key_ticket');
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
}