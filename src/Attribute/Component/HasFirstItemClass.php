<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets that implement the first item class method.
 */
trait HasFirstItemClass
{
    protected string $firstItemClass = '';

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
}
