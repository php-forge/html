<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the active method.
 */
trait HasActive
{
    protected bool $active = false;

    /**
     * Set the active state.
     *
     * @param bool $value Whether the menu item is active.
     *
     * @return static A new instance of the current class with the specified active state.
     */
    public function active(bool $value): static
    {
        $new = clone $this;
        $new->active = $value;

        return $new;
    }

    /**
     * @return bool Whether the menu item is active.
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
