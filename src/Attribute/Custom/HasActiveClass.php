<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which have an active class property.
 */
trait HasActiveClass
{
    protected string $activeClass = 'active';

    /**
     * Returns a new instance specifying the `CSS` class to be appended to the active class.
     *
     * @param string $value The `CSS` class to be appended to the active class.
     */
    public function activeClass(string $value): static
    {
        $new = clone $this;
        $new->activeClass = $value;

        return $new;
    }
}
