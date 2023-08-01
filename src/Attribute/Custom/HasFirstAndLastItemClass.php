<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which have an first and last item class property.
 */
trait HasFirstAndLastItemClass
{
    protected string $firstItemClass = '';
    protected string $lastItemClass = '';

    /**
     * Returns a new instance specifying the `CSS` class to be appended to the first item.
     *
     * @param string $value The `CSS` class that will be assigned to the first item.
     */
    public function firstItemClass(string $value): self
    {
        $new = clone $this;
        $new->firstItemClass = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the `CSS` class to be appended to the last item.
     *
     * @param string $value The `CSS` class that will be assigned to the last item.
     */
    public function lastItemClass(string $value): self
    {
        $new = clone $this;
        $new->lastItemClass = $value;

        return $new;
    }
}
