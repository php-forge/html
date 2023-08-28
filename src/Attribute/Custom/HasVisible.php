<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which implement the visible method.
 */
trait HasVisible
{
    private bool $visible = true;

    /**
     * @return bool Whether the visible state is true.
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * Set the visible state.
     *
     * @param bool $value The visible state.
     *
     * @return static A new instance of the current class with the specified visible state.
     */
    public function visible(bool $value): static
    {
        $new = clone $this;
        $new->visible = $value;

        return $new;
    }
}
