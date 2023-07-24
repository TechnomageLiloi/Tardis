<?php

namespace Liloi\I60\Domain\Tickets;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @todo: add tests
 * @todo: add docs
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    private ?int $mark = null;

    /**
     * Get mark of ticket collection.
     *
     * @return int
     */
    public function getMark(): int
    {
        if($this->mark === null)
        {
            $sum = 0;

            /** @var Entity $entity */
            foreach ($this as $entity)
            {
                if(!$entity->isMarkApplied())
                {
                    continue;
                }

                $sum += $entity->getMark();
            }

            $this->mark = $sum;
        }

        return $this->mark;
    }

    public function getEfficiency(): string
    {
        return round($this->getMark() / 24, 3, PHP_ROUND_HALF_UP);
    }
}