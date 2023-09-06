<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets that implement the first and last item class method.
 */
trait HasFirstAndLastItemClass
{
    protected string $firstItemClass = '';
    protected string $lastItemClass = '';

    /**
     * Set the first item class.
     *
     * @param string $value The `CSS` class that will be assigned to the first item.
     *
     * @return static A new instance of the current class with the specified first item class.
     */
    public function firstItemClass(string $value): static
    {
        $new = clone $this;
        $new->firstItemClass = $value;

        return $new;
    }

    /**
     * Sets the last item class.
     *
     * @param string $value The `CSS` class that will be assigned to the last item.
     *
     * @return static A new instance of the current class with the specified last item class.
     */
    public function lastItemClass(string $value): static
    {
        $new = clone $this;
        $new->lastItemClass = $value;

        return $new;
    }
}
